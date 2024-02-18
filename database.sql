CREATE DATABASE elemix;

USE elemix;

CREATE TABLE combinations (
    id INT(10) NOT NULL AUTO_INCREMENT PRIMARY KEY,
    element_1 VARCHAR(250),
    subscript_1 INT(10),
    element_2 VARCHAR(250),
    subscript_2 INT(10),
    combination VARCHAR(250),
    source VARCHAR(250)
) ;

INSERT INTO combinations (element_1, subscript_1, element_2, subscript_2, combination) VALUES 
('N', 3, 'H', 1, 'NH3'),
('Al', 3, 'Br', -1, 'AlBr3'),
('Al', 3, 'Cl', -1, 'AlCl3'),
('Al', 3, 'O', -2, 'Al2O3'),
('Al', 3, 'F', -1, 'AlF3'),
('Al', 3, 'S', -2, 'Al2S3'),
('Al', 3, 'I', -1, 'AlI3'),
('Ba', 2, 'O', -2, 'BaO'),
('Ba', 2, 'I', -1, 'BaI2'),
('Ba', 2, 'F', -1, 'BaF2'),
('Ba', 2, 'Cl', -1, 'BaCl2'),
('Ba', 2, 'Br', -1, 'BaBr2'),
('Ca', 2, 'H', 1, 'CaH2'),
('Ca', 2, 'I', -1, 'CaI2'),
('Ca', 2, 'O', -2, 'CaO'),
('Ca', 2, 'Br', -1, 'CaBr2'),
('Ca', 2, 'Cl', -1, 'CaCl2'),
('C', 4, 'S', -2, 'CS2'),
('C', 2, 'O', -2, 'CO'),
('Cd', 2, 'S', -2, 'CdS'),
('H', 1, 'Cl', -1, 'HCl'),
('P', -3, 'Cl', -1, 'PCl3'),
('K', 1, 'I', -1, 'KI'),
('K', 1, 'F', -1, 'KF'),
('K', 1, 'Cl', -1, 'KCl'),
('K', 1, 'Br', -1, 'KBr'),
('Se', 4, 'O', -2, 'SeO2'),
('Na', 1, 'Br', -1, 'NaBr'),
('Na', 1, 'Cl', -1, 'NaCl'),
('Na', 1, 'S', -2, 'Na2S'),
('Na', 1, 'O', -2, 'Na2O'),
('Ag', 1, 'Cl', -1, 'AgCl'),
('Sr', 2, 'Cl', -1, 'SrCl2'),
('Zn', 2, 'Br', -1, 'ZnBr2'),
('Fe', 3, 'O', -2, 'Fe2O3'),
('H', 1, 'O', -2, 'H2O'),
('As', 3, 'S', 2, 'As2S3'),
('Mg', 2, 'Cl', 1, 'MgCl2'),
('H', 1, 'F', -1, 'HF'),
('H', 1, 'S', 2, 'H2S'),
('N', 2, 'O', -2, 'NO2'),
('Ni', 2, 'O', -2, 'NiO'),
('Zn', 2, 'O', -2, 'ZnO'),
('Ag', 1, 'S', -2, 'Ag2S'),
('Co', 2, 'Cl', 1, 'CoCl2'),
('Hg', 2, 'O', -2, 'HgO'),
('Pb', 2, 'I', 1, 'PbI2'),
('Cd', 2, 'Se', -2, 'CdSe'),
('Ti', 4, 'O', -2, 'TiO2'),
('Sb', 3, 'S', -2, 'Sb2S3');

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
