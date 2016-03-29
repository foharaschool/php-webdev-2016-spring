<?php
    class MadLibs {
        // Class Variables
        private $person_name;
        private $ailment;
        private $noun1;
        private $bodypart1;
        private $adjective1;
        private $bodypart2;
        private $noun2;
        private $medicine;
        private $fav_drink;
        private $noun3;
        private $story;
        
        // Build Story variable
        private function setStory() {
        $this->story = "<h3>Doctor Visit</h3>"
                . "<p>Patient: Thank you very much for seeing me, Doctor $this->person_name.</p>\n"
                . "<p>Doctor: What seems to be the problem, young $this->noun1?</p>\n"
                . "<p>Patient: When I move my $this->bodypart1, it hurts.</p>\n"
                . "<p>Doctor: Then, don''t move your $this->bodypart1.</p>\n"
                . "<p>Patient: Also, my $this->bodypart2 aches. Could you give me some $this->medicine?</p>\n"
                . "<p>Doctor: That may not be necessary, yet. Let me take a look. Open your $this->noun2 wide. Good. Now, I''m going to listen to your $this->noun3 beat. Breathe in and out, slowly.</p>\n"
                . "<p>Patient: Doctor $this->person_name, what is wrong with me?</p>\n"
                . "<p>Doctor: Unfortunately, you have a $this->ailment, but don''t worry. You will get better, soon. Take this medication, drink plenty of $this->fav_drink, rest, and call me if you feel $this->adjective1.</p>\n";
        }
        
        // Getters and Setters
        public function getPerson_name() {
            return $this->person_name;
        }
        
        public function getAilment() {
            return $this->ailment;
        }
        
        public function getNoun1() {
            return $this->noun1;
        }
        
        public function getBodypart1() {
            return $this->bodypart1;
        }
        
        public function getAdjective1() {
            return $this->adjective1;
        }
        
        public function getBodypart2() {
            return $this->bodypart2;
        }
        
        public function getNoun2() {
            return $this->noun2;
        }
        
        public function getMedicine() {
            return $this->medicine;
        }
        
        public function getFav_drink() {
            return $this->fav_drink;
        }
        
        public function getNoun3() {
            return $this->noun3;
        }
        
        // Setters
        public function setPerson_name($person_name) {
            $this->person_name = $person_name;
        }
        
        public function setAilment($ailment) {
            $this->ailment = $ailment;
        }
        
        public function setNoun1($noun1) {
            $this->noun1 = $noun1;
        }
        
        public function setBodypart1($bodypart1) {
            $this->bodypart1 = $bodypart1;
        }
        
        public function setAdjective1($adjective1) {
            $this->adjective1 = $adjective1;
        }
        
        public function setBodypart2($bodypart2) {
            $this->bodypart2 = $bodypart2;
        }
        
        public function setNoun2($noun2) {
            $this->noun2 = $noun2;
        }
        
        public function setMedicine($medicine) {
            $this->medicine = $medicine;
        }
        
        public function setFav_drink($fav_drink) {
            $this->fav_drink = $fav_drink;
        }
        
        public function setNoun3($noun3) {
            $this->noun3 = $noun3;
        }
        
        // Database connect method
        private function dbConnect() {
            $dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME)
                    or die('There was a problem connecting to the database');
            
            return $dbc;
        }
        
        private function dbClose() {
            return mysqli_close($dbc);
        }
        
        // The purpose of this method is to insert form inputs
        public function runInsert() {
            // Collect and store inputs
            // Build query by looping over array for each input
            $query = "INSERT INTO madlib_entry(person_name, ailment, noun1, bodypart1, adjective, bodypart2, noun2, medicine, fav_drink, noun3) "
                    . "VALUES('$this->person_name', '$this->ailment', '$this->noun1', '$this->bodypart1', '$this->adjective1', '$this->bodypart2', '$this->noun2', '$this->medicine', '$this->fav_drink', '$this->noun3')";
                
            // Run input insert query
            $dbc = $this->dbConnect();
                    
            mysqli_query($dbc, $query)
                or die('There was a problem running the insert query');
                
            // Insert $story
            $time = time();
            $this->setStory();
            $query = "INSERT INTO madlib_story(story, time_submit) " .
            "VALUES('$this->story', $time)";
            
            // Run input insert $story
            $result = mysqli_query($dbc, $query)
                or die('There was a problem running the insert query');
            
            mysqli_close($dbc);
        }
        
        public function storyFetch() {
            $dbc = $this->dbConnect();
                    
            $query = "SELECT * FROM madlib_story ORDER BY time_submit DESC";
            
            $result = mysqli_query($dbc, $query)
                    or die('Error querying stories from database');
                    
            mysqli_close($dbc);
            
            return $result;
                
        }
        
        public function buildStory($result) {
            date_default_timezone_set("America/Chicago");
            while($row = mysqli_fetch_array($result)) {
                $fetched_story = $row['story'];
                $timestamp = $row['time_submit'];
                
                echo '<div class="story">'
                        . '<p><strong>' . date("n\/j\/Y h:i:s a \- T", $timestamp) . '</strong></p>'
                        . $fetched_story
                        . '</div>';
            }
        }
        
    }
?>