CREATE DATABASE elemix;

USE elemix;

CREATE TABLE combinations (
    id INT(10) NOT NULL AUTO_INCREMENT PRIMARY KEY,
    element_1 VARCHAR(250),
    subscript_1 INT(10),
    element_2 VARCHAR(250),
    subscript_2 INT(10),
    combination VARCHAR(250),
    combination_name VARCHAR(250),
    source VARCHAR(250)
) ;

INSERT INTO combinations (element_1, subscript_1, element_2, subscript_2, combination, combination_name, source) VALUES 
('N', 3, 'H', 1, 'NH3', 'Ammonia', 'assets/gif/NH3.gif'), 
('Al', 3, 'Br', -1, 'AlBr3', 'Aluminum Bromide', 'assets/gif/AlBr3.gif')
('Cd', 1, 'S', -1, 'CdS', 'Cadium Sulfide', 'assets/gif/CdS.gif'), 
('H', 1, 'Cl', -1, 'HCl', 'Hydrochloric Acid', 'assets/gif/HCl.gif'), 
('Na', 1, 'Cl', -1, 'NaCl', 'Sodium Chloride', 'assets/gif/NaCl.gif'), 
('Ag', 1, 'Cl', -1, 'AgCl', 'Silver Chloride', 'assets/gif/AgCl.gif'), 
('Hg', 2, 'O', -2, 'HgO', 'Mercuric Oxide', 'assets/gif/HgO.gif'), 
('Pb', 2, 'I', 1, 'PbI2', 'Lead Iodide', 'assets/gif/PbI2.gif'), 
('N', 2, 'Cl', -1, 'NiCl2', 'Nickel Chloride', 'assets/gif/NiCl2.gif'), 
('P', 5, 'Br', -1, 'PBr5', 'Phosporus Pentabromide', 'assets/gif/PBr5.gif'); 


CREATE TABLE elements (
    id INT(10) NOT NULL AUTO_INCREMENT PRIMARY KEY,
    symbol VARCHAR(250),
    element_name VARCHAR(250)
);


INSERT INTO elements (symbol, element_name)
VALUES
('N', 'Nitrogen'),
('H', 'Hydrogen'),
('Al', 'Aluminum'),
('Br', 'Bromine'),
('Cl', 'Chlorine'),
('O', 'Oxygen'),
('F', 'Fluorine'),
('S', 'Sulfur'),
('I', 'Iodine'),
('Ba', 'Barium'),
('Ca', 'Calcium'),
('C', 'Carbon'),
('Cd', 'Cadmium'),
('P', 'Phosphorus'),
('K', 'Potassium'),
('Se', 'Selenium'),
('Na', 'Sodium'),
('Ag', 'Silver'),
('Sr', 'Strontium'),
('Zn', 'Zinc'),
('Fe', 'Iron'),
('As', 'Arsenic'),
('Mg', 'Magnesium'),
('Ni', 'Nickel'),
('Ti', 'Titanium'),
('Co', 'Cobalt'),
('Hg', 'Mercury'),
('Pb', 'Lead');

-- Add more elements if needed
