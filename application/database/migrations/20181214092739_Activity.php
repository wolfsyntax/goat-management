<?php

      class Migration_Activity extends CI_Migration {

        public function up() {
          $this->dbforge->add_field(array(
            'activity_id' => array(
              'type' => 'INT',
              'constraint' => 11,
              'auto_increment' => TRUE,
            ),
            'user_id' => array(
              'type' => 'INT',
              'constraint' => 11,
            ),
            'eartag_id' => array(
              'type'  => 'INT',
              'constraint'  => 11,
            ),
            'date_perform' => array(
              'type' => 'DATE',
            ),
            'activity_type' => array(
              'type' => 'VARCHAR',
              'constraint' => 64,
            ),
            'remarks' => array(
              'type' => 'TEXT',
            ),            
          ));

          $this->dbforge->add_key('activity_id', TRUE);

          $this->dbforge->add_field('CONSTRAINT fk_activity_user_id FOREIGN KEY (`user_id`) REFERENCES user_account(`user_id`)');

          $this->dbforge->add_field('CONSTRAINT fk_activity_eartag_id FOREIGN KEY (`eartag_id`) REFERENCES goat_profile(`eartag_id`)');


          $this->dbforge->create_table('activity', TRUE, array('AUTO_INCREMENT' => '1'));

        }

        public function down() {
          $this->dbforge->drop_table('activity');
        }

      }