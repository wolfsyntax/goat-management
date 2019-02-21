<?php

      class Migration_Breeding_Record extends CI_Migration {

        public function up() {
          $this->dbforge->add_field(array(
            'breeding_id'       => array(
              'type'            => 'INT',
              'constraint'      => 11,
              'auto_increment'  => TRUE,
            ),
            'activity_id'       => array(
              "type"            => "INT",
              'constraint'      => 11,
            ),
            'sire_id'           => array(
              'type'            => 'INT',
              'constraint'      => 11,
            ),
            'is_pregnant'       => array(
              'type'            => 'VARCHAR',
              'constraint'      => 64,
              'default'         => "No",
            ),
          ));

          $this->dbforge->add_key('breeding_id', TRUE);

          $this->dbforge->add_field('CONSTRAINT fk_breeding_activity_id FOREIGN KEY (`activity_id`) REFERENCES activity(`activity_id`)');

          $this->dbforge->add_field('CONSTRAINT fk_breeding_sire_id FOREIGN KEY (`sire_id`) REFERENCES goat_profile(`eartag_id`)');

          $this->dbforge->create_table('breeding_record', TRUE, array('AUTO_INCREMENT' => '1'));

        }

        public function down() {

          $this->dbforge->drop_table('breeding_record');
          
        }

      }