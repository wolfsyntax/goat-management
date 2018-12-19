<?php

      class Migration_User_Account extends CI_Migration {

        public function up() {
          $this->dbforge->add_field(array(
            'user_id' => array(
              'type' => 'INT',
              'constraint' => 11,
              'auto_increment' => TRUE
            ),
            'username'  => array(
              'type'  => 'VARCHAR',
              'constraint'  => 255,
            ),
            'password'  => array(
              'type'  => 'TEXT',
            ),
            'phone_number'  => array(
              'type'  => 'VARCHAR',
              'constraint'  => 15,
            ),
            'account_type'  => array(
              'type'  => 'VARCHAR',
              'constraint'  => 32,
              'default'   => 'tenant',
            ),
            'first_name'  => array(
              'type'  => 'VARCHAR',
              'constraint'  => 255,
            ),
            'last_name'  => array(
              'type'  => 'VARCHAR',
              'constraint'  => 255,
            ),
          ));

          $this->dbforge->add_key('user_id', TRUE);

          $this->dbforge->create_table('user_account',TRUE,array('AUTO_INCREMENT' => '1'));

        }

        public function down() {
          $this->dbforge->drop_table('user_account');
        }

      }