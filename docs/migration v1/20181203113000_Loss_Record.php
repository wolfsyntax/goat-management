<?php

      class Migration_Loss_Record extends CI_Migration {

        public function up() {
          $this->dbforge->add_field(array(
            'loss_id' => array(
              'type' => 'INT',
              'constraint' => 11,
              'auto_increment' => TRUE
            ),
            'eartag_id' => array(
              'type' => 'INT',
              'constraint' => 11,
            ),
            'user_id' => array(
              'type' => 'INT',
              'constraint' => 11,
            ),
            'loss_caused' => array(
              'type' =>'VARCHAR',
              'constraint' => 32,
            ),
            'loss_date' => array(
              'type' => 'DATE',
            ),
            'description' => array(
              'type' => 'VARCHAR',
              'constraint' => 255,
              'default' => '-',
            )
          ));

          $this->dbforge->add_key('loss_id', TRUE);

          $this->dbforge->add_field('CONSTRAINT fk_loss_user FOREIGN KEY (`user_id`) REFERENCES User_Account(`user_id`)');

          $this->dbforge->add_field('CONSTRAINT fk_loss_profile FOREIGN KEY (`eartag_id`) REFERENCES Goat_Profile(`eartag_id`)');

          $this->dbforge->create_table('loss_record',array("AUTO_INCREMENT" => 1));

        }

        public function down() {
          $this->dbforge->drop_table('loss_record');
        }

      }