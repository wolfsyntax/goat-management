<?php

      class Migration_Inventory extends CI_Migration {

        public function up() {
          $this->dbforge->add_field(array(
            'inventory_id' => array(
              'type' => 'INT',
              'constraint' => 11,
              'auto_increment' => TRUE
            )
          ));

          $this->dbforge->add_key('inventory_id', TRUE);
          $this->dbforge->create_table('inventory');

        }

        public function down() {
          $this->dbforge->drop_table('inventory');
        }

      }