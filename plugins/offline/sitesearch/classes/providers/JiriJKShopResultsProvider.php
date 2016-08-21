<?php
namespace OFFLINE\SiteSearch\Classes\Providers;

use Jiri\JKShop\Models\Product;
use Illuminate\Database\Eloquent\Collection;
use OFFLINE\SiteSearch\Classes\Result;
use OFFLINE\SiteSearch\Models\Settings;
use System\Models\File;

/**
 * Searches the contents generated by the
 * Jiri.JKShop plugin
 *
 * @package OFFLINE\SiteSearch\Classes\Providers
 */
class JiriJKShopResultsProvider extends ResultsProvider
{
    /**
     * Runs the search for this provider.
     *
     * @return ResultsProvider
     */
    public function search()
    {
        if ( ! $this->isInstalledAndEnabled()) {
            return $this;
        }

        foreach ($this->products() as $product) {
            // Make this result more relevant, if the query is found in the title
            $relevance = mb_stripos($product->title, $this->query) === false ? 1 : 2;

            $result        = new Result($this->query, $relevance);
            $result->title = $product->title;
            $result->text  = $product->short_description;
            $result->url   = $this->getUrl($product);

            if (count($product->images) > 0) {
                $image = $product->images->first();
                if ($image instanceof File) {
                    $result->thumb = $image;
                }
            }

            $this->addResult($result);
        }

        return $this;
    }

    /**
     * Get all products with matching title or content.
     *
     * @return Collection
     */
    protected function products()
    {
        return Product::with(['images'])
                      ->where('title', 'like', "%{$this->query}%")
                      ->orWhere('description', 'like', "%{$this->query}%")
                      ->orWhere('short_description', 'like', "%{$this->query}%")
                      ->having('active', '=', true)
                      ->orderBy('updated_at', 'desc')
                      ->get();
    }

    /**
     * Checks if the Jiri.JKShop Plugin is installed and
     * enabled in the config.
     *
     * @return bool
     */
    protected function isInstalledAndEnabled()
    {
        return $this->isPluginAvailable($this->identifier)
        && Settings::get('jiri_jkshop_enabled', false);
    }

    /**
     * Generates the url to a shop product.
     *
     * @param $product
     *
     * @return string
     */
    protected function getUrl($product)
    {
        $url = trim(Settings::get('jiri_jkshop_itemurl', '/product'), '/');

        return implode('/', [$url, $product->slug]);
    }

    /**
     * Display name for this provider.
     *
     * @return mixed
     */
    public function displayName()
    {
        return Settings::get(
            'jiri_jkshop_label',
            trans('offline.sitesearch::lang.settings.jiri_jkshop_itemurl_badge')
        );
    }

    /**
     * Returns the plugin's identifier string.
     *
     * @return string
     */
    public function identifier()
    {
        return 'Jiri.JKShop';
    }

}