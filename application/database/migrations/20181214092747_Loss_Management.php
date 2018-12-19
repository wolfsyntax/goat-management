<?php

      class Migration_Loss_Management extends CI_Migration {

        public function up() {
          $this->dbforge->add_field(array(
            'loss_id' => array(
              'type' => 'INT',
              'constraint' => 11,
              'auto_increment' => TRUE
            ),
            'cause'  => array(
              'type'  => 'VARCHAR',
              'constraint'  => 255,
            ),
            'activity_id'  => array(
              'type'  => 'INT',
              'constraint'  => 11,
            ),

          ));

          $this->dbforge->add_key('loss_id', TRUE);

          $this->dbforge->add_field('CONSTRAINT fk_loss_activity_id FOREIGN KEY (`activity_id`) REFERENCES activity(`activity_id`)');

          $this->dbforge->create_table('loss_management',TRUE,array('AUTO_INCREMENT' => '1'));

        }

        public function down() {
          $this->dbforge->drop_table('loss_management');
        }

      }