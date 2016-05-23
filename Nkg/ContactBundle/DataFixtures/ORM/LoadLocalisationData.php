<?php

namespace Nkg\ContactBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use \Nkg\ContactBundle\Entity\Country;
use \Nkg\ContactBundle\Entity\Localisation;
use Cocur\Slugify\Slugify;

class LoadLocalisationData implements FixtureInterface {

	private $data_countries = array(
		array(// row #0
			'id' => 1,
			'numero' => '971',
			'label' => 'Guadeloupe',
			'slug' => 'guadeloupe',
			'fuseau' => 'America/Guadeloupe',
		),
		array(// row #1
			'id' => 2,
			'numero' => '972',
			'label' => 'Martinique',
			'slug' => 'martinique',
			'fuseau' => 'America/Martinique',
		),
		array(// row #2
			'id' => 3,
			'numero' => '973',
			'label' => 'Guyane',
			'slug' => 'guyane',
			'fuseau' => 'America/Cayenne',
		),
		array(// row #3
			'id' => 4,
			'numero' => '974',
			'label' => 'Réunion',
			'slug' => 'reunion',
			'fuseau' => 'Indian/Reunion',
		),
		array(// row #4
			'id' => 5,
			'numero' => '976',
			'label' => 'Mayotte',
			'slug' => 'mayotte',
			'fuseau' => 'Indian/Mayotte',
		),
	);
	private $data_localisation = array(
		array(// row #0
			'country_id' => 1,
			'label' => 'Abymes',
		),
		array(// row #1
			'country_id' => 1,
			'label' => 'Anse-Bertrand',
		),
		array(// row #2
			'country_id' => 1,
			'label' => 'Baie-Mahault',
		),
		array(// row #3
			'country_id' => 1,
			'label' => 'Baillif',
		),
		array(// row #4
			'country_id' => 1,
			'label' => 'Basse-Terre',
		),
		array(// row #5
			'country_id' => 1,
			'label' => 'Bouillante',
		),
		array(// row #6
			'country_id' => 1,
			'label' => 'Capesterre-Belle-Eau',
		),
		array(// row #7
			'country_id' => 1,
			'label' => 'Capesterre-de-Marie-Galante',
		),
		array(// row #8
			'country_id' => 1,
			'label' => 'Gourbeyre',
		),
		array(// row #9
			'country_id' => 1,
			'label' => 'Désirade',
		),
		array(// row #10
			'country_id' => 1,
			'label' => 'Deshaies',
		),
		array(// row #11
			'country_id' => 1,
			'label' => 'Grand-Bourg',
		),
		array(// row #12
			'country_id' => 1,
			'label' => 'Gosier',
		),
		array(// row #13
			'country_id' => 1,
			'label' => 'Goyave',
		),
		array(// row #14
			'country_id' => 1,
			'label' => 'Lamentin',
		),
		array(// row #15
			'country_id' => 1,
			'label' => 'Morne-à-l\'Eau',
		),
		array(// row #16
			'country_id' => 1,
			'label' => 'Moule',
		),
		array(// row #17
			'country_id' => 1,
			'label' => 'Petit-Bourg',
		),
		array(// row #18
			'country_id' => 1,
			'label' => 'Petit-Canal',
		),
		array(// row #19
			'country_id' => 1,
			'label' => 'Pointe-à-Pitre',
		),
		array(// row #20
			'country_id' => 1,
			'label' => 'Pointe-Noire',
		),
		array(// row #21
			'country_id' => 1,
			'label' => 'Port-Louis',
		),
		array(// row #22
			'country_id' => 1,
			'label' => 'Saint-Claude',
		),
		array(// row #23
			'country_id' => 1,
			'label' => 'Saint-François',
		),
		array(// row #24
			'country_id' => 1,
			'label' => 'Saint-Louis',
		),
		array(// row #25
			'country_id' => 1,
			'label' => 'Sainte-Anne',
		),
		array(// row #26
			'country_id' => 1,
			'label' => 'Sainte-Rose',
		),
		array(// row #27
			'country_id' => 1,
			'label' => 'Terre-de-Bas',
		),
		array(// row #28
			'country_id' => 1,
			'label' => 'Terre-de-Haut',
		),
		array(// row #29
			'country_id' => 1,
			'label' => 'Trois-Rivières',
		),
		array(// row #30
			'country_id' => 1,
			'label' => 'Vieux-Fort',
		),
		array(// row #31
			'country_id' => 1,
			'label' => 'Vieux-Habitants',
		),
		array(// row #32
			'country_id' => 2,
			'label' => 'Ajoupa-Bouillon',
		),
		array(// row #33
			'country_id' => 2,
			'label' => 'Anses-d\'Arlet',
		),
		array(// row #34
			'country_id' => 2,
			'label' => 'Basse-Pointe',
		),
		array(// row #35
			'country_id' => 2,
			'label' => 'Carbet',
		),
		array(// row #36
			'country_id' => 2,
			'label' => 'Case-Pilote',
		),
		array(// row #37
			'country_id' => 2,
			'label' => 'Diamant',
		),
		array(// row #38
			'country_id' => 2,
			'label' => 'Ducos',
		),
		array(// row #39
			'country_id' => 2,
			'label' => 'Fonds-Saint-Denis',
		),
		array(// row #40
			'country_id' => 2,
			'label' => 'Fort-de-France',
		),
		array(// row #41
			'country_id' => 2,
			'label' => 'François',
		),
		array(// row #42
			'country_id' => 2,
			'label' => 'Grand\'Rivière',
		),
		array(// row #43
			'country_id' => 2,
			'label' => 'Gros-Morne',
		),
		array(// row #44
			'country_id' => 2,
			'label' => 'Lamentin',
		),
		array(// row #45
			'country_id' => 2,
			'label' => 'Lorrain',
		),
		array(// row #46
			'country_id' => 2,
			'label' => 'Macouba',
		),
		array(// row #47
			'country_id' => 2,
			'label' => 'Marigot',
		),
		array(// row #48
			'country_id' => 2,
			'label' => 'Marin',
		),
		array(// row #49
			'country_id' => 2,
			'label' => 'Morne-Rouge',
		),
		array(// row #50
			'country_id' => 2,
			'label' => 'Prêcheur',
		),
		array(// row #51
			'country_id' => 2,
			'label' => 'Rivière-Pilote',
		),
		array(// row #52
			'country_id' => 2,
			'label' => 'Rivière-Salée',
		),
		array(// row #53
			'country_id' => 2,
			'label' => 'Robert',
		),
		array(// row #54
			'country_id' => 2,
			'label' => 'Saint-Esprit',
		),
		array(// row #55
			'country_id' => 2,
			'label' => 'Saint-Joseph',
		),
		array(// row #56
			'country_id' => 2,
			'label' => 'Saint-Pierre',
		),
		array(// row #57
			'country_id' => 2,
			'label' => 'Sainte-Anne',
		),
		array(// row #58
			'country_id' => 2,
			'label' => 'Sainte-Luce',
		),
		array(// row #59
			'country_id' => 2,
			'label' => 'Sainte-Marie',
		),
		array(// row #60
			'country_id' => 2,
			'label' => 'Schœlcher',
		),
		array(// row #61
			'country_id' => 2,
			'label' => 'Trinité',
		),
		array(// row #62
			'country_id' => 2,
			'label' => 'Trois-Îlets',
		),
		array(// row #63
			'country_id' => 2,
			'label' => 'Vauclin',
		),
		array(// row #64
			'country_id' => 2,
			'label' => 'Morne-Vert',
		),
		array(// row #65
			'country_id' => 2,
			'label' => 'Bellefontaine',
		),
		array(// row #66
			'country_id' => 3,
			'label' => 'Régina',
		),
		array(// row #67
			'country_id' => 3,
			'label' => 'Cayenne',
		),
		array(// row #68
			'country_id' => 3,
			'label' => 'Iracoubo',
		),
		array(// row #69
			'country_id' => 3,
			'label' => 'Kourou',
		),
		array(// row #70
			'country_id' => 3,
			'label' => 'Macouria',
		),
		array(// row #71
			'country_id' => 3,
			'label' => 'Mana',
		),
		array(// row #72
			'country_id' => 3,
			'label' => 'Matoury',
		),
		array(// row #73
			'country_id' => 3,
			'label' => 'Saint-Georges',
		),
		array(// row #74
			'country_id' => 3,
			'label' => 'Remire-Montjoly',
		),
		array(// row #75
			'country_id' => 3,
			'label' => 'Roura',
		),
		array(// row #76
			'country_id' => 3,
			'label' => 'Saint-Laurent-du-Maroni',
		),
		array(// row #77
			'country_id' => 3,
			'label' => 'Sinnamary',
		),
		array(// row #78
			'country_id' => 3,
			'label' => 'Montsinéry-Tonnegrande',
		),
		array(// row #79
			'country_id' => 3,
			'label' => 'Ouanary',
		),
		array(// row #80
			'country_id' => 3,
			'label' => 'Approuague (chef-lieu Régina)',
		),
		array(// row #81
			'country_id' => 3,
			'label' => 'Saül',
		),
		array(// row #82
			'country_id' => 3,
			'label' => 'Maripasoula',
		),
		array(// row #83
			'country_id' => 3,
			'label' => 'Samson (chef-lieu Dégrad-Samson)',
		),
		array(// row #84
			'country_id' => 3,
			'label' => 'Moyenne-Mana (chef-lieu Mana)',
		),
		array(// row #85
			'country_id' => 3,
			'label' => 'Camopi',
		),
		array(// row #86
			'country_id' => 3,
			'label' => 'Grand-Santi',
		),
		array(// row #87
			'country_id' => 3,
			'label' => 'Saint-Élie',
		),
		array(// row #88
			'country_id' => 3,
			'label' => 'Comté (chef-lieu Dégrad-Edmond)',
		),
		array(// row #89
			'country_id' => 3,
			'label' => 'Apatou',
		),
		array(// row #90
			'country_id' => 3,
			'label' => 'Awala-Yalimapo',
		),
		array(// row #91
			'country_id' => 3,
			'label' => 'Papaichton',
		),
		array(// row #92
			'country_id' => 4,
			'label' => 'Les Avirons',
		),
		array(// row #93
			'country_id' => 4,
			'label' => 'Bras-Panon',
		),
		array(// row #94
			'country_id' => 4,
			'label' => 'Cilaos',
		),
		array(// row #95
			'country_id' => 4,
			'label' => 'Entre-Deux',
		),
		array(// row #96
			'country_id' => 4,
			'label' => 'L\'Étang-Salé',
		),
		array(// row #97
			'country_id' => 4,
			'label' => 'Petite-Île',
		),
		array(// row #98
			'country_id' => 4,
			'label' => 'La Plaine-des-Palmistes',
		),
		array(// row #99
			'country_id' => 4,
			'label' => 'Le Port',
		),
		array(// row #100
			'country_id' => 4,
			'label' => 'La Possession',
		),
		array(// row #101
			'country_id' => 4,
			'label' => 'Saint-André',
		),
		array(// row #102
			'country_id' => 4,
			'label' => 'Saint-Benoît',
		),
		array(// row #103
			'country_id' => 4,
			'label' => 'Saint-Denis',
		),
		array(// row #104
			'country_id' => 4,
			'label' => 'Saint-Joseph',
		),
		array(// row #105
			'country_id' => 4,
			'label' => 'Saint-Leu',
		),
		array(// row #106
			'country_id' => 4,
			'label' => 'Saint-Louis',
		),
		array(// row #107
			'country_id' => 4,
			'label' => 'Saint-Paul',
		),
		array(// row #108
			'country_id' => 4,
			'label' => 'Saint-Pierre',
		),
		array(// row #109
			'country_id' => 4,
			'label' => 'Saint-Philippe',
		),
		array(// row #110
			'country_id' => 4,
			'label' => 'Sainte-Marie',
		),
		array(// row #111
			'country_id' => 4,
			'label' => 'Sainte-Rose',
		),
		array(// row #112
			'country_id' => 4,
			'label' => 'Sainte-Suzanne',
		),
		array(// row #113
			'country_id' => 4,
			'label' => 'Salazie',
		),
		array(// row #114
			'country_id' => 4,
			'label' => 'Le Tampon',
		),
		array(// row #115
			'country_id' => 4,
			'label' => 'Les Trois-Bassins',
		),
		array(// row #116
			'country_id' => 5,
			'label' => 'Acoua',
		),
		array(// row #117
			'country_id' => 5,
			'label' => 'Bandraboua',
		),
		array(// row #118
			'country_id' => 5,
			'label' => 'Bandrele',
		),
		array(// row #119
			'country_id' => 5,
			'label' => 'Bouéni',
		),
		array(// row #120
			'country_id' => 5,
			'label' => 'Chiconi',
		),
		array(// row #121
			'country_id' => 5,
			'label' => 'Chirongui',
		),
		array(// row #122
			'country_id' => 5,
			'label' => 'Dembeni',
		),
		array(// row #123
			'country_id' => 5,
			'label' => 'Dzaoudzi',
		),
		array(// row #124
			'country_id' => 5,
			'label' => 'Kani-Kéli',
		),
		array(// row #125
			'country_id' => 5,
			'label' => 'Koungou',
		),
		array(// row #126
			'country_id' => 5,
			'label' => 'Mamoudzou',
		),
		array(// row #127
			'country_id' => 5,
			'label' => 'Mtsamboro',
		),
		array(// row #128
			'country_id' => 5,
			'label' => 'M\'Tsangamouji',
		),
		array(// row #129
			'country_id' => 5,
			'label' => 'Ouangani',
		),
		array(// row #130
			'country_id' => 5,
			'label' => 'Pamandzi',
		),
		array(// row #131
			'country_id' => 5,
			'label' => 'Sada',
		),
		array(// row #132
			'country_id' => 5,
			'label' => 'Tsingoni',
		),
	);

	/**
	 * {@inheritDoc}
	 */
	public function load(ObjectManager $manager) {
		$slugify = new Slugify();

		foreach ($this->data_countries as $data_country) {
			$country = new Country();
			$country->setFuseau($data_country['fuseau']);
			$country->setSlug($data_country['slug']);
			$country->setLabel($data_country['label']);
			$country->setNumero($data_country['numero']);
			$manager->persist($country);

			foreach ($this->data_localisation as $data_loc) {
				if ($data_loc["country_id"] == $data_country['id']) {
					$localisation = new Localisation();
					$localisation->setLabel($data_loc["label"]);
					$localisation->setSlug($slugify->slugify($data_loc["label"]) ."_".$country->getSlug());
					$localisation->setCountry($country);
					$country->addLocalisation($localisation);
					$manager->persist($localisation);
				}
			}
		}
		$manager->flush();
	}

}
