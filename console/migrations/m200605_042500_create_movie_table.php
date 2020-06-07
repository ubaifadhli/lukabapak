<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%user_data}}`.
 */
class m200605_042500_create_movie_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%movie}}', [
            'id' => $this->primaryKey(),
            'title' => $this->string(64),
            'genre' => $this->string(64),
            'director_name' => $this->string(64),
            'studio_name' => $this->string(64),
            'status_id' => $this->integer(11),
            'screen_quality' => $this->string(8),
            'rating' => $this->string(32),
            'image_path' => $this->string(64),
            'synopsis' => $this->text(),
        ]);

        $movieName = array( "Kingsman: The Secret Service",
                            "Dolittle",
                            "Joker",
                            "Frozen II",
                            "Parasite",
                            "Star Wars: The Rise of Skywalker",
                            "Onward",
                            "Bohemian Rhapsody",
                            "A Star Is Born",
                            "The Conjuring");
        $movieGenre = array("Comedy",
                            "Adventure",
                            "Crime",
                            "Family",
                            "Drama",
                            "Science Fiction",
                            "Animation",
                            "Drama",
                            "Romance",
                            "Horror");
        $movieDirectorName = array( "Matthew Vaughn",
                                    "Stephen Gaghan",
                                    "Todd Phillips",
                                    "Chris Buck",
                                    "Bong Joon Ho",
                                    "J.J. Abrams",
                                    "Dan Scanlon",
                                    "Bryan Singer",
                                    "Bradley Cooper",
                                    "James Wan");
        $movieStudioName = array(   "20th Century Fox",
                                    "Universal Pictures",
                                    "Warner Bros. Pictures",
                                    "Walt Disney Animation Studios",
                                    "CJ Entertainment",
                                    "Walt Disney Studios",
                                    "Walt Disney Studios",
                                    "20th Century Fox",
                                    "Warner Bros. Pictures",
                                    "Warner Bros. Pictures");
        $movieRating = array( "R",
                              "PG",
                              "R",
                              "PG",
                              "R",
                              "PG-13",
                              "PG",
                              "PG-13",
                              "R",
                              "R");
        $movieImagePath = array(  "kingsman.jpg",
                                  "dolittle.jpg",
                                  "joker.jpg",
                                  "frozen2.jpg",
                                  "parasite.jpg",
                                  "star_wars_the_rise_of_skywalker.jpg",
                                  "onward.jpg",
                                  "bohemian_rhapsody.jpg",
                                  "a_star_is_born.jpg",
                                  "the_conjuring.jpg");

        $movieSynopsis = array( "A super secret spy organization that recruits an unrefined but assuring street kid into the agency training regime just as a global threat's narrative emerges out of a twisted tech genius.",
                              "A physician finds that he can speak with animals.",
                              "During the 1980s, while becoming an infamous psychopathic crime figure, there is a failed stand up comedian driven insane and turns to a life of chaos and crime in Gotham City.",
                              "Anna elsa, Kristoff and Olaf are currently going far in the forest to know the truth about an ancient mystery of these realm.",
                              "All unemployed, the family of Ki-taek chooses interest from the glamorous and wealthy Parks due to his or her livelihood until they get entangled in a sudden episode.",
                              "The surviving members of the resistance face the First Order once again, and the legendary conflict between the Jedi and the Sith reaches its peak bringing the Skywalker saga to its end.",
                              "In a suburban fantasy world, two teenage elf brothers embark on an extraordinary quest to discover if there is still a little magic left out there.",
                              "Once they form the stone'n' roster group Queen at 1970, singer Freddie Mercury, guitarist Brian May, drummer Roger Taylor and bass guitarist John Deacon simply take the audio world by storm. Hit songs come to be instant classics. When the increasingly crazy lifestyle of Mercury starts to spiral out of control, Queen faces its biggest challenge yet -- finding a way",
                              "Seasoned musician Jackson Maine finds -- and falls in love with -- fighting artist Ally. She has just about given up on her dream until Jack coaxes her to make it big as a singer. But even as Ally's career will take off, the personal side of these relationship is breaking down, as Jack fights a continuing fight.",
                              "Lorraine Warren and paranormal investigators Ed work to enable a family terrorized with a presence within their own farm house. Forced to confront a powerful entity, the Warrens are captured at the most terrifying case of his or her own lifetimes.");

        for($i = 0; $i < count($movieName); $i++) {
          $this->insert('{{%movie}}', [
            'title' => $movieName[$i],
            'genre' => $movieGenre[$i],
            'director_name' => $movieDirectorName[$i],
            'studio_name' => $movieStudioName[$i],
            'status_id' => ($i < 5) ? 1 : 0,
            'screen_quality' => "HD",
            'rating' => $movieRating[$i],
            'image_path' => $movieImagePath[$i],
            'synopsis' => $movieSynopsis[$i],
          ]);
        }
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%movie}}');
    }
}
