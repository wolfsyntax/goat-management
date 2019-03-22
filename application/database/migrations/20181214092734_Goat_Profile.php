<?php

      class Migration_Goat_Profile extends CI_Migration {

        public function up() {
          
          $this->dbforge->add_field(array(
            'eartag_id'     => array(
              'type'        => 'INT',
              'constraint'  => 11,
            ),
            'eartag_color'  => array(
              'type'        => 'VARCHAR',
              'constraint'  => 255,
            ),
            'gender'        => array(
              'type'        => 'VARCHAR',
              'constraint'  => 255,
            ),
            'nickname'      => array(
              'type'        => 'VARCHAR',
              'constraint'  => 255,
              'null'        => TRUE,
            ),
            'body_color'    => array(
              'type'        => 'VARCHAR',
              'constraint'  => 255,
            ),
            'is_castrated'  => array(
              'type'        => 'VARCHAR',
              'constraint'  => 64,
            ),
            'status'        => array(
              'type'        => 'VARCHAR',
              'constraint'  => 32,
              'default'     => "active",
            ),
            'category'      => array(
              'type'        => 'VARCHAR',
              'constraint'  => 255,
            ),
            'birth_date'        => array(
              'type'            => 'DATE',
              'default'         => NULL,
            ),
          ));

          $this->dbforge->add_key('eartag_id', TRUE);
          
          $this->dbforge->create_table('goat_profile');

        }

        public function down() {
          $this->dbforge->drop_table('goat_profile');
        }

      }