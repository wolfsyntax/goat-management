<?php

      class Migration_Birth_Record extends CI_Migration {

        public function up() {
          $this->dbforge->add_field(array(
            'birth_id' => array(
              'type' => 'INT',
              'constraint' => 11,
              'auto_increment' => TRUE
            ),
            'birth_date'  => array(
              'type'  => 'DATE',
              'default' => NULL,
            ),
            'dam_id'  => array(
              'type'  => 'INT',
              'constraint'  => 11,
            ),
            'sire_id'  => array(
              'type'  => 'INT',
              'constraint'  => 11,
            ),
            'eartag_id'  => array(
              'type'  => 'INT',
              'constraint'  => 11,
            ),
          ));

          $this->dbforge->add_key('birth_id', TRUE);

          $this->dbforge->add_field('CONSTRAINT fk_birth_sire_id FOREIGN KEY (`sire_id`) REFERENCES goat_profile(`eartag_id`)');

          $this->dbforge->add_field('CONSTRAINT fk_birth_dam_id FOREIGN KEY (`dam_id`) REFERENCES goat_profile(`eartag_id`)');

          $this->dbforge->add_field('CONSTRAINT fk_birth_eartag_id FOREIGN KEY (`eartag_id`) REFERENCES goat_profile(`eartag_id`)');

          $this->dbforge->create_table('birth_record', TRUE, array('AUTO_INCREMENT' => '1'));

        }

        public function down() {
          $this->dbforge->drop_table('birth_record');
        }

      }