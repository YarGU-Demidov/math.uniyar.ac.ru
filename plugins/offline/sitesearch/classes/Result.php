<?php

namespace OFFLINE\SiteSearch\Classes;

use Config;
use Html;
use OFFLINE\SiteSearch\Models\Settings;
use Str;
use System\Models\File;

/**
 * Object to store a result's data.
 *
 * @package OFFLINE\SiteSearch\Classes
 */
class Result
{
    /**
     * @var string
     */
    public $excerpt;
    /**
     * @var float
     */
    public $relevance;
    /**
     * @var string
     */
    public $provider;
    /**
     * @var string
     */
    public $query;

    /**
     * Result constructor.
     *
     * @param              $query
     * @param int          $relevance
     * @param string       $provider
     */
    public function __construct($query, $relevance = 1, $provider = '')
    {
        $this->setQuery($query);
        $this->setRelevance($relevance);
        $this->setProvider($provider);
    }

    /**
     * Set a property on the Result.
     *
     * Since only public properties can be accessed via Twig and it
     * does not support __get, we need to make all properties public.
     * This method tries to ensure that only valid properties
     * are set and all values are passed through the respective
     * setter method.
     *
     * @param $property
     * @param $value
     *
     * @throws \InvalidArgumentException
     */
    public function __set($property, $value)
    {
        $method = 'set' . ucfirst($property);
        if ( ! method_exists($this, $method)) {
            throw new \InvalidArgumentException(sprintf('"%s" is not a valid property to set.', $property));
        }

        call_user_func([$this, $method], $value);
    }

    /**
     * @param $query
     *
     * @return Result
     */
    public function setQuery($query)
    {
        $this->query = $query;

        return $this;
    }

    /**
     * @param float $relevance
     *
     * @return $this
     */
    public function setRelevance($relevance)
    {
        $this->relevance = (float)$relevance;

        return $this;
    }

    /**
     * @param string $provider
     *
     * @return $this
     */
    public function setProvider($provider)
    {
        $this->provider = $provider;

        return $this;
    }

    /**
     * @param string $title
     *
     * @return Result
     */
    public function setTitle($title)
    {
        $this->title = $this->markQuery($this->prepare($title));

        return $this;
    }

    /**
     * Sets the text property and creates
     * a separate excerpt to display in the results
     * listing.
     *
     * @param string $text
     *
     * @return Result
     */
    public function setText($text)
    {
        $this->text    = $this->prepare($text);
        $this->excerpt = $this->createExcerpt(
            $this->markQuery($this->text)
        );

        return $this;
    }

    /**
     * @param string $url
     *
     * @return Result
     */
    public function setUrl($url)
    {
        $this->url = $url;

        return $this;
    }

    /**
     * @param File $thumb
     *
     * @return Result
     */
    public function setThumb(File $thumb = null)
    {
        $this->thumb = $thumb;

        return $this;
    }

    /**
     * Shortens a string and removes all HTML.
     *
     * @param string $string
     *
     * @return string
     */
    protected function prepare($string)
    {
        // Add a space before each tag to prevent
        // paragraphs from sticking together after
        // removing the html.
        $string = str_replace('<', ' <', $string);

        return Html::strip($string);
    }

    /**
     * Creates an excerpt of the query-relevant parts of $text
     * to display below a search result.
     *
     * @param $text
     *
     * @return string
     */
    protected function createExcerpt($text)
    {
        $length = Settings::get('excerpt_length', 250);

        $position = mb_strpos($text, '<mark>' . $this->query . '</mark>');
        $start    = (int)$position - ($length / 2);

        if ($start < 0) {
            return Str::limit($text, $length);
        }

        // The relevant part is in the middle of the string, so surround
        // it with ...
        return '...' . trim(mb_substr($text, $start, $length)) . '...';
    }


    /**
     * Surrounds all instances of the query
     * in $text with <mark> tags.
     *
     * @param $text
     *
     * @return string
     */
    private function markQuery($text)
    {
        // Only mark the query if this feature is enabled
        if ( ! Settings::get('mark_results', true)) {
            return $text;
        }

        return (string)preg_replace('/(' . preg_quote($this->query, '/') . ')/i', '<mark>$0</mark>', $text);
    }

}