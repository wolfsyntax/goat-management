<?php

      class Migration_Purchase_Record extends CI_Migration {

        public function up() {
          $this->dbforge->add_field(array(
            'purchase_id' => array(
              'type' => 'INT',
              'constraint' => 11,
              'auto_increment' => TRUE
            ),
            'purchase_weight'  => array(
              'type'  => 'FLOAT',
              'constraint'  => "11,2",
              'default' => "0.00",
            ),
            'purchase_price'  => array(
              'type'  => 'FLOAT',
              'constraint'  => "11,2",
              'default' => "0.00",
            ),
            'purchase_date'  => array(
              'type'  => 'DATE',
              'default' => NULL,
            ),
            'purchase_from'  => array(
              'type'  => 'VARCHAR',
              'constraint'  => 255,
            ),
            'eartag_id'  => array(
              'type'  => 'INT',
              'constraint'  => 11,
            ),
            'user_id' => array(
              'type'  => 'INT',
              'constraint'  => 11,
            ),
          ));

          $this->dbforge->add_key('purchase_id', TRUE);

          $this->dbforge->add_field('CONSTRAINT fk_purchase_eartag_id FOREIGN KEY (`eartag_id`) REFERENCES goat_profile(`eartag_id`)');

          $this->dbforge->add_field('CONSTRAINT fk_purchase_user_id FOREIGN KEY (`user_id`) REFERENCES user_account(`user_id`)');

          $this->dbforge->create_table('purchase_record',TRUE,array('AUTO_INCREMENT' => '1'));

        }

        public function down() {
          $this->dbforge->drop_table('purchase_record');
        }

      }