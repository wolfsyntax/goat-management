<?php

      class Migration_Expense extends CI_Migration {

        public function up() {

          $this->dbforge->add_field(array(
            'expense_id' => array(
              'type' => 'INT',
              'constraint' => 11,
              'auto_increment' => TRUE,
            ),
            'expense_type' => array(
              'type' => 'VARCHAR',
              'constraint' => 255,
            ),
            'total_amount' => array(
              'type' => 'FLOAT',
              'constraint' => '8,2',
              'default' => 0.0,
            ),
            'total_ml' => array(
              'type' => 'INT',
              'constraint' => 8,
              'null' => TRUE,
            ),
            'expense_date' => array(
              'type' => 'DATE',
            ),
            'quantity' => array(
              'type' => 'INT',
              'constraint' => 8,
              'null' => TRUE,
            ),
            'user_id' => array(
              'type' => 'INT',
              'constraint' => 11,
            ),
            'vendor_name' => array(
              'type' => 'VARCHAR',
              'constraint' => 255,
              'null' => TRUE,
            ),
          ));

           $this->dbforge->add_field('CONSTRAINT fk_expense_user FOREIGN KEY (`user_id`) REFERENCES User_Account(`user_id`)');

          $this->dbforge->add_key('expense_id', TRUE);

          $this->dbforge->create_table('expense',TRUE,array('AUTO_INCREMENT' => '1',));

        }

        public function down() {
          $this->dbforge->drop_table('expense');
        }

      }