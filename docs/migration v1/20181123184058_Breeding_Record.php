<?php

      class Migration_Breeding_Record extends CI_Migration {

        public function up() {
          $this->dbforge->add_field(array(
            'breeding_id' => array(
              'type' => 'INT', 'constraint' => 11, 
              'auto_increment' => TRUE,
            ),
            'breeding_date' => array(
              'type' => 'DATE',
            ),
            'notes' => array(
              'type' => 'TEXT',
              'null' => TRUE,
            ),
            'sire_id' => array(
              'type' => 'INT',
              'constraint' => 11,
            ),
            'dam_id' => array(
              'type' => 'INT',
              'constraint' => 11,
            ),
            'is_pregnant' => array(
              'type' => 'INT',
              'constraint' => 1,
              'default' => 0,
              'null' => TRUE,
            ),
          ));


          $this->dbforge->add_key('breeding_id', TRUE);
          
          $this->dbforge->add_field('CONSTRAINT fk_sire_breeding FOREIGN KEY (`sire_id`) REFERENCES Goat_Profile(`eartag_id`)');

          $this->dbforge->add_field('CONSTRAINT fk_dam_breeding FOREIGN KEY (`dam_id`) REFERENCES Goat_Profile(`eartag_id`)');

          $this->dbforge->create_table('breeding_record',TRUE,array('AUTO_INCREMENT' => '1',));

        }

        public function down() {
          $this->dbforge->drop_table('breeding_record');
        }

      }