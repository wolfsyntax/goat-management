 <?php

      class Migration_Goat_Profile extends CI_Migration {

        public function up() {

          $this->dbforge->add_field(array(

            'eartag_id' => array(
              'type' => 'INT',
              'constraint' => 11,
              'unique' => TRUE,
            ),
            'eartag_color' => array(
              'type' => 'VARCHAR',
              'constraint' => 64,
            ),
            'gender' => array(
              'type' => 'VARCHAR',
              'constraint' => 64,
            ),
            'body_color' => array(
              'type' => 'VARCHAR',
              'constraint' => 64,
            ),
            'birth_date' => array(
              'type' => 'DATE',
              'null' => 'TRUE',
            ),
            'birth_weight' => array(
              'type' => 'INT',
              'constraint' => 11,
              'null' => TRUE,
            ),
            'sire_id' => array(
              'type' => 'INT',
              'constraint' => 11,
              'null' => TRUE,
            ),
            'dam_id' => array(
              'type' => 'INT',
              'constraint' => 11,
              'null' => TRUE,
            ),
            'is_castrated' => array(
              'type' => 'VARCHAR',
              'constraint' => 5,
              'null' => TRUE,
            ),
            'status' => array(
              'type' => 'VARCHAR',
              'constraint' => 128,
              'default' => 'active',
            ),
                        
          ));

          $this->dbforge->add_key('eartag_id', TRUE);

          $this->dbforge->add_field('CONSTRAINT fk_sire_offspring FOREIGN KEY (`sire_id`) REFERENCES goat_profile(`eartag_id`)');

          $this->dbforge->add_field('CONSTRAINT fk_dam_offspring FOREIGN KEY (`dam_id`) REFERENCES goat_profile(`eartag_id`)');

          $this->dbforge->create_table('goat_profile',TRUE,array('AUTO_INCREMENT' => '1',));

        }

        public function down() {
          $this->dbforge->drop_table('goat_profile');
        }

      }