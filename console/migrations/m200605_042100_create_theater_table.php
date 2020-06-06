<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%user_data}}`.
 */
class m200605_042100_create_theater_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%theater}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string(64),
            'address' => $this->string(64),
            'telephone_number' => $this->integer(16),
            'city_id' => $this->integer(11),
        ]);

        $theater = array(
          0 => array(
            'name' => 'GRAND CITY XXI',
            'address' => 'Grand City Mal, Jl. Gubeng Pojok No. 1',
            'telephone_number' => 52405821,
            'city_id' => 1,
          ),
          1 => array(
            'name' => 'PAKUWON MALL XXI',
            'address' => 'Pakuwon Mall Lt. 2M, Jln. Puncak Indah Lontar No.2',
            'telephone_number' => 99148021,
            'city_id' => 1,
          ),
          2 => array(
            'name' => 'TRANSMART RUNGKUT XXI',
            'address' => 'Mall Transmart Lt.3, Jln. Kali Rungkut',
            'telephone_number' => 87855945,
            'city_id' => 1,
          ),
          3 => array(
            'name' => 'TUNJUNGAN 5 XXI',
            'address' => 'Tunjungan Plaza Lt.10, Jln. Basuki Rahmat No.08-12',
            'telephone_number' => 51164521,
            'city_id' => 1,
          ),
          4 => array(
            'name' => 'ROYAL XXI',
            'address' => 'Royal Plaza Lt.3, Jln. Jend. Ahmad Yani No. 16-18',
            'telephone_number' => 8271521,
            'city_id' => 1,
          ),
          5 => array(
            'name' => 'BEACHWALK XXI',
            'address' => 'Beach Walk Lantai 2, Jl. Pantai Kuta',
            'telephone_number' => 8465621,
            'city_id' => 2,
          ),
          6 => array(
            'name' => 'GALERIA XXI',
            'address' => 'DFS GALLERIA, Jl. By Pass Ngurah Rai',
            'telephone_number' => 767021,
            'city_id' => 2,
          ),
          7 => array(
            'name' => 'LEVEL 21 XXI',
            'address' => 'Mall Level 21 Lt. 4, Jln. Teuku Umar No. 1',
            'telephone_number' => 3352121,
            'city_id' => 2,
          ),
          8 => array(
            'name' => 'PARK 23 XXI',
            'address' => 'Park 23 Lt. 3, Jln. Kediri Circus Water Park Kuta',
            'telephone_number' => 4727621,
            'city_id' => 2,
          ),
          9 => array(
            'name' => 'TSM XXI',
            'address' => 'Trans Studio Mall Bali Lt. 1, Jln. Imam Bonjol No. 440',
            'telephone_number' => 6207201,
            'city_id' => 2,
          ),
          10 => array(
            'name' => 'ARION XXI',
            'address' => 'Arion Plaza Lantai 4, Jl. Pemuda Kav. 3-4 Rawamangun',
            'telephone_number' => 4757658,
            'city_id' => 3,
          ),
          11 => array(
            'name' => 'BASSURA XXI',
            'address' => 'Bassura City Lt. 2, Jl. Basuki Rahmat No. 1',
            'telephone_number' => 22807229,
            'city_id' => 3,
          ),
          12 => array(
            'name' => 'CIPINANG XXI',
            'address' => 'MAL CIPINANG INDAH Lt.3, Jl. Raya Kalimalang No.88',
            'telephone_number' => 29486938,
            'city_id' => 3,
          ),
          13 => array(
            'name' => 'DJAKARTA XXI',
            'address' => 'Jl. MH Thamrin No. 9',
            'telephone_number' => 3156725,
            'city_id' => 3,
          ),
          14 => array(
            'name' => 'EPICENTRUM XXI',
            'address' => 'Epicentrum Walk Ground Floor, Jl. H.R. Rasuna Said',
            'telephone_number' => 29941300,
            'city_id' => 3,
          ),
          15 => array(
            'name' => 'M’TOS XXI',
            'address' => 'Makassar Town Square Lantai 3, Jl. Perintis Kemerdekaan',
            'telephone_number' => 583321,
            'city_id' => 4,
          ),
          16 => array(
            'name' => 'NIPAH XXI',
            'address' => 'Nipah Mall Lt. 1, Jln. Urip Sumohardjo',
            'telephone_number' => 3663321,
            'city_id' => 4,
          ),
          17 => array(
            'name' => 'PANAKKUKANG XXI',
            'address' => 'Panakkukang Mall LT 3, JL BOULEVARD',
            'telephone_number' => 4662023,
            'city_id' => 4,
          ),
          18 => array(
            'name' => 'STUDIO XXI',
            'address' => 'Mall Ratu Indah Lt. 4, Jl. Sam Ratulangi No. 35',
            'telephone_number' => 851721,
            'city_id' => 4,
          ),
          19 => array(
            'name' => 'TSM XXI',
            'address' => 'Trans Makassar Lantai 2,Jl. HM Dg Patompo Metro Tj Bunga',
            'telephone_number' => 3604121,
            'city_id' => 4,
          ),
          20 => array(
            'name' => 'DELIPARK XXI',
            'address' => 'Delipark Mall Podomoro Lt. 5, Jln. Guru Patimpus Blok OPQ No. 1',
            'telephone_number' => 62007774,
            'city_id' => 5,
          ),
          21 => array(
            'name' => 'HERMES XXI',
            'address' => 'Hermes Place Polonia, Jl. Wolter Monginsidi No. 45',
            'telephone_number' => 80501121,
            'city_id' => 5,
          ),
          22 => array(
            'name' => 'MANHATTAN XXI',
            'address' => 'Jln. Gatot Subroto No. 217',
            'telephone_number' => 80867821,
            'city_id' => 5,
          ),
          23 => array(
            'name' => 'MILLENIUM XXI',
            'address' => 'Millennium ITC Center Medan, Jl. Kapten Muslim No. 111',
            'telephone_number' => 80867221,
            'city_id' => 5,
          ),
          24 => array(
            'name' => 'RINGROAD CITYWALKS XXI',
            'address' => 'Jln. Gagak Hitam No.28',
            'telephone_number' => 80026553,
            'city_id' => 5,
          ),
        );

        for($i = 0; $i < count($theater); $i++) {
          $this->insert('{{%theater}}', $theater[$i]);
        }
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%theater}}');
    }
}
