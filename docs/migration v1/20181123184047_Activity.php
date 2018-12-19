<?php

      class Migration_Activity extends CI_Migration {

        public function up() {
          
          $this->dbforge->add_field(array(
            'activity_id' => array(
              'type' => 'INT',
              'constraint' => 11,
              'auto_increment' => TRUE,     
            ),
            'eartag_id' => array(
              'type' => 'INT',
              'constraint' => 11,
            ), 
            'performed_date' => array(
              'type' => 'DATE',
            ), 
            'next_schedule' => array(
              'type' => 'DATE',
            ), 
            'prescription' => array(
              'type' => 'TEXT',
            ),
            'activity_type' => array(
              'type' => 'VARCHAR',
              'constraint' => 255,
            ), 
            'user_id' => array(
              'type' => 'INT',
              'constraint' => 11,
            ),
            'quantity' => array(
              'type' => 'INT',
              'constraint' => 8,
              'default' => 0,
            ),
            'medicine_name' => array(
              'type' => 'VARCHAR',
              'constraint' => 255,
              'default' => 'N/A',
            ),
          ));

          $this->dbforge->add_key('activity_id', TRUE);

          $this->dbforge->add_field('CONSTRAINT fk_activity_goat FOREIGN KEY (`eartag_id`) REFERENCES Goat_Profile(`eartag_id`)');

          $this->dbforge->add_field('CONSTRAINT fk_activity_user FOREIGN KEY (`user_id`) REFERENCES User_Account(`user_id`)');

          $this->dbforge->create_table('activity',TRUE,array('AUTO_INCREMENT' => '1',));

        }

        public function down() {
          $this->dbforge->drop_table('activity');
        }

      }