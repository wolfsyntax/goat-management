<?php

      class Migration_Health_Record extends CI_Migration {

        public function up() {
          $this->dbforge->add_field(array(
            'checkup_id' => array(
              'type' => 'INT',
              'constraint' => 11,
              'auto_increment' => TRUE
            ),
            'checkup_type'  => array(
              'type'  => 'VARCHAR',
              'constraint'  => 255,
            ),
            'prescription'  => array(
              'type'  => 'VARCHAR',
              'constraint'  => 255,
            ),
            'quantity'  => array(
              'type'  => 'FLOAT',
              'constraint'  => "11,2",
            ),
            'activity_id'  => array(
              'type'  => 'INT',
              'constraint'  => 11,
            ),
          ));

          $this->dbforge->add_key('checkup_id', TRUE);

          $this->dbforge->add_field('CONSTRAINT fk_checkup_eartag_id FOREIGN KEY (`eartag_id`) REFERENCES goat_profile(`eartag_id`)');

          $this->dbforge->add_field('CONSTRAINT fk_checkup_activity_id FOREIGN KEY (`activity_id`) REFERENCES activity(`activity_id`)');

          $this->dbforge->create_table('health_record', TRUE, array('AUTO_INCREMENT' => '1'));

        }

        public function down() {
          $this->dbforge->drop_table('health_record');
        }

      }