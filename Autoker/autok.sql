CREATE DATABASE auto_dekor;
USE auto_dekor;
 CREATE TABLE autok (
    id INT AUTO_INCREMENT PRIMARY KEY,
    tipus VARCHAR(255) NOT NULL,
    km_allas INT NOT NULL,
    le INT NOT NULL,
    ar INT NOT NULL,
    uzemanyag_tipus VARCHAR(50) NOT NULL,
    valto_tipus VARCHAR(50) NOT NULL,
    image_path VARCHAR(255)
);
Table marka {
  id integer [primary key] 
  model_id integer 
  name varchar [note: 'Car brand'] 
  created_at timestamp 
}

Table model {
  id integer [primary key] 
  marka_id integer 
  name varchar [note: 'Name of the car model'] 
  year integer [note: 'Manufacturing year'] 
  engine varchar [note: 'Engine specification'] 
  created_at timestamp 
}

Table kivitel {
  id integer [primary key] 
  model_id integer  
  type varchar [note: 'Type of the car'] 
  color varchar [note: 'Car color'] 
  status varchar [note: 'Status of the car'] 
  created_at timestamp 
}
Table fueltype {
id integer [primary key]
fueltype_id varchar
}

Ref: marka.model_id > model.id
Ref: kivitel.model_id > model.id
