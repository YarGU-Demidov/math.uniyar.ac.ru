<?php

return [
	'404'      => 'Seite nicht gefunden.',
	'auth'     => [
		'title'          => 'Anmelden',
		'username'       => 'Benutzername',
		'password'       => 'Passwort',
		'login'          => 'Login',
		'logout'         => 'Logout',
		'wrong-username' => 'Falscher Benutzername',
		'wrong-password' => 'oder falsches Passwort'
	],
	'ckeditor' => [
		'upload'        => [
			'success' => 'Datei hochgeladen: \\n- GrГ¶Гџe: :size kb \\n- Breite/HГ¶he: :width x :height',
			'error'   => [
				'common'              => 'Die Datei konnte nicht hochgeladen werden.',
				'wrong_extension'     => 'Das Format der Datei ":file" ist nicht erlaubt.',
				'filesize_limit'      => 'Die Datei darf hГ¶chstens :size kb groГџ sein.',
				'imagesize_max_limit' => 'Breite x HГ¶he = :width x :height \\n Maximal sind :maxwidth x :maxheight erlaubt',
				'imagesize_min_limit' => 'Breite x HГ¶he = :width x :height \\n Das Bild muss mindestens :minwidth x :minheight Pixel groГџ sein',
			]
		],
		'image_browser' => [
			'title'    => 'Bild vom Server benutzen',
			'subtitle' => 'Bild zum EinfГјgen auswГ¤hlen',
		],
	],
	'table'    => [
		'new-entry'      => 'Neu',
		'edit'           => 'Г„ndern',
		'delete'         => 'LГ¶schen',
		'delete-confirm' => 'Soll dieser Eintag wirklich gelГ¶scht werden?',
		'delete-error'   => 'Es ist ein Fehler beim LГ¶schen aufgetreten. Bitte erst alle hiermit verknГјpften EintrГ¤ge lГ¶schen.',
		'moveUp'         => 'Hoch',
		'moveDown'       => 'Runter',
		'filter'         => 'Zeige Г¤hnliche',
		'filter-goto'    => 'Anzeigen',
		'save'           => 'Speichern',
		'cancel'         => 'Abbrechen',
		'download'       => 'Herunterladen',
		'all'            => 'Alle',
		'processing'     => '<i class="fa fa-5x fa-circle-o-notch fa-spin"></i>',
		'loadingRecords' => 'Lade...',
		'lengthMenu'     => 'Zeige _MENU_ EintrГ¤ge',
		'zeroRecords'    => 'Keine EintrГ¤ge gefunden.',
		'info'           => 'Zeige EintrГ¤ge von _START_ bis _END_ von insgesamt _TOTAL_',
		'infoEmpty'      => 'Zeige 0 bis 0 von 0 EintrГ¤gen',
		'infoFiltered'   => '(gefiltert von _MAX_ EintrГ¤gen insgesamt)',
		'infoThousands'  => '.',
		'infoPostFix'    => '',
		'search'         => 'Suche: ',
		'emptyTable'     => 'Keine Daten verfГјgbar',
		'paginate'       => [
			'first'    => '<i class="fa fa-angle-double-left"></i>',
			'previous' => '<i class="fa fa-angle-left"></i>',
			'next'     => '<i class="fa fa-angle-right"></i>',
			'last'     => '<i class="fa fa-angle-double-right"></i>'
		]
	],
	'select'   => [
		'nothing'  => 'Nichts ausgewГ¤hlt',
		'selected' => 'ausgewГ¤hlt'
	]
];