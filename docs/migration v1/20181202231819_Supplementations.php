<?php

      class Migration_Supplementations extends CI_Migration {

        public function up() {
          $this->dbforge->add_field(array(
            'supplementation_id' => array(
              'type' => 'INT',
              'constraint' => 11,
              'auto_increment' => TRUE,
            ),
            'notes' => array(
              'type' => 'VARCHAR',
              'constraint' => 255,
              'null' => TRUE,
            ),
            'supplementation_date' => array(
              'type' => 'DATE',
            ),
            'user_id' => array(
              'type' => 'INT',
              'constraint' => 11,
            ),
            'eartag_id' => array(
              'type' => 'INT',
              'constraint' => 11,
            ),            
            'prescription' => array(
              'type' => 'VARCHAR',
              'constraint' => 11,
            ),
            'next_schedule' => array(
              'type' => 'DATE',
              'null' => TRUE,
            ),
          ));

          $this->dbforge->add_key('supplementation_id', TRUE);

         $this->dbforge->add_field('CONSTRAINT fk_profile_supplementation FOREIGN KEY (`eartag_id`) REFERENCES Goat_Profile(`eartag_id`)');

          $this->dbforge->add_field('CONSTRAINT fk_user_supplementation FOREIGN KEY (`user_id`) REFERENCES User_Account(`user_id`)');


          $this->dbforge->create_table('supplementations',TRUE,array('AUTO_INCREMENT' => '1',));

        }

        public function down() {
          $this->dbforge->drop_table('supplementations');
        }

      }