<?php

      class Migration_Inventory_Record extends CI_Migration {

        public function up() {
          $this->dbforge->add_field(array(
            'inventory_id' => array(
              'type' => 'INT',
              'constraint' => 11,
              'auto_increment' => TRUE
            ),
            'item_name'  => array(
              'type'  => 'VARCHAR',
              'constraint'  => 255,
            ),
            'item_type'  => array(
              'type'  => 'VARCHAR',
              'constraint'  => 255,
            ),
            'quantity'  => array(
              'type'  => 'FLOAT',
              'constraint'  => "11,2",
              'default' => "0.00",
            ),
          ));

          $this->dbforge->add_key('inventory_id', TRUE);
          $this->dbforge->create_table('inventory_record');

        }

        public function down() {
          $this->dbforge->drop_table('inventory_record');
        }

      }