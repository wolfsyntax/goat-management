<?php

      class Migration_Vaccinations extends CI_Migration {

        public function up() {
          $this->dbforge->add_field(array(
            'vaccination_id' => array(
              'type' => 'INT',
              'constraint' => 11,
              'auto_increment' => TRUE,
            ),
            'vaccination_date' => array(
              'type' => 'DATE',
            ),
            'prescription' => array(
              'type' => 'TEXT',
              'null' => TRUE,
            ),
            'user_id' => array(
              'type' => 'INT',
              'constraint' => 11,
            ),
            'eartag_id' => array(
              'type' => 'INT',
              'constraint' => 11,
            ),
            'next_schedule' => array(
              'type' => 'DATE',
              'null' => TRUE,
            ),
            'notes' => array(
              'type' => 'VARCHAR',
              'constraint' => 255,
              'null' => TRUE,
            )
          ));

          $this->dbforge->add_key('vaccination_id', TRUE);

          $this->dbforge->add_field('CONSTRAINT fk_profile_vaccination FOREIGN KEY (`eartag_id`) REFERENCES Goat_Profile(`eartag_id`)');

          $this->dbforge->add_field('CONSTRAINT fk_user_vaccination FOREIGN KEY (`user_id`) REFERENCES User_Account(`user_id`)');


          $this->dbforge->create_table('vaccinations',TRUE,array('AUTO_INCREMENT' => '1',));

        }

        public function down() {
          $this->dbforge->drop_table('vaccinations');
        }

      }