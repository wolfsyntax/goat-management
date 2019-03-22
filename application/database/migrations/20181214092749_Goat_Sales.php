<?php

      class Migration_Goat_Sales extends CI_Migration {

        public function up() {
          $this->dbforge->add_field(array(
            'sales_id'          => array(
              'type'            => 'INT',
              'constraint'      => 11,
              'auto_increment'  => TRUE,
            ),
            'price_per_kilo'    => array(
              'type'            => 'FLOAT',
              'constraint'      => "11,2",
              'default'         => "0.00",
            ),
            'weight'            => array(
              'type'            => 'FLOAT',
              'constraint'      => "11,2",
              'default'         => "0.00",
            ),
            'transact_date'     => array(
              'type'            => 'DATE',
              'default'         => NULL,
            ),
            'sold_to'           => array(
              'type'            => 'VARCHAR',
              'constraint'      => 255,
            ),
            'remarks'           => array(
              'type'            => 'TEXT',
            ),            
            'eartag_id'         => array(
              'type'            => 'INT',
              'constraint'      => 11,
            ),
            'user_id'           => array(
              'type'            => 'INT',
              'constraint'      => 11,
            ),
            'status'           => array(
              'type'           => 'VARCHAR',
              'constraint'     => 255,
              'default'        => NULL, 
            ),
          ));

          $this->dbforge->add_key('sales_id', TRUE);

          $this->dbforge->add_field('CONSTRAINT fk_sales_eartag_id FOREIGN KEY (`eartag_id`) REFERENCES goat_profile(`eartag_id`)');

          $this->dbforge->add_field('CONSTRAINT fk_sales_user_id FOREIGN KEY (`user_id`) REFERENCES user_account(`user_id`)');

          $this->dbforge->create_table('goat_sales', TRUE, array('AUTO_INCREMENT' => '1'));

        }

        public function down() {
          $this->dbforge->drop_table('goat_sales');
        }

      }