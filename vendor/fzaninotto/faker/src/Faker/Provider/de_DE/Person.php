<<<<<<< HEAD
<?php

namespace Faker\Provider\de_DE;

class Person extends \Faker\Provider\Person
{
    protected static $maleNameFormats = array(
        '{{firstNameMale}} {{lastName}}',
        '{{firstNameMale}} {{lastName}}',
        '{{firstNameMale}} {{lastName}}',
        '{{firstNameMale}} {{lastName}}',
        '{{firstNameMale}} {{lastName}}-{{lastName}}',
        '{{titleMale}} {{firstNameMale}} {{lastName}}',
        '{{firstNameMale}} {{lastName}} {{suffix}}',
        '{{titleMale}} {{firstNameMale}} {{lastName}} {{suffix}}',
    );

    protected static $femaleNameFormats = array(
        '{{firstNameFemale}} {{lastName}}',
        '{{firstNameFemale}} {{lastName}}',
        '{{firstNameFemale}} {{lastName}}',
        '{{firstNameFemale}} {{lastName}}',
        '{{firstNameFemale}} {{lastName}}-{{lastName}}',
        '{{titleFemale}} {{firstNameFemale}} {{lastName}}',
        '{{firstNameFemale}} {{lastName}} {{suffix}}',
        '{{titleFemale}} {{firstNameFemale}} {{lastName}} {{suffix}}',
    );

    // From http://de.wiktionary.org/wiki/Verzeichnis:Deutsch/Liste_der_h%C3%A4ufigsten_m%C3%A4nnlichen_Vornamen_Deutschlands
    protected static $firstNameMale = array(
        'Abbas', 'Abdul', 'Abdullah', 'Abraham', 'Abram', 'Achim', 'Ada', 'Adalbert', 'Adam', 'Adelbert', 'Adem', 'Adolf', 'Adrian', 'Ahmad', 'Ahmed', 'Ahmet', 'Alan', 'Alban', 'Albert', 'Alberto', 'Albin', 'Albrecht', 'Aldo', 'Aleksandar', 'Aleksander', 'Aleksandr', 'Aleksej', 'Alessandro', 'Alex', 'Alexander', 'Alexandre', 'Alexandros', 'Alexei', 'Alexej', 'Alf', 'Alfons', 'Alfonso', 'Alfred', 'Alfredo', 'Ali', 'Alois', 'Aloys', 'Alwin', 'Amir', 'Anastasios', 'Anatol', 'Anatoli', 'Anatolij', 'Andre', 'Andreas', 'Andree', 'Andrei', 'Andrej', 'Andres', 'Andrew', 'Andrey', 'Andrzej', 'André', 'Andy', 'Angelo', 'Anselm', 'Ansgar', 'Ante', 'Anthony', 'Anto', 'Anton', 'Antonino', 'Antonio', 'Antonios', 'Antonius', 'Apostolos', 'Aribert', 'Arif', 'Armin', 'Arnd', 'Arndt', 'Arne', 'Arnfried', 'Arnim', 'Arno', 'Arnold', 'Arnulf', 'Arthur', 'Artur', 'Athanasios', 'Attila', 'August', 'Augustin', 'Axel', 'Aziz',
        'Baldur', 'Balthasar', 'Baptist', 'Bartholomäus', 'Bastian', 'Bayram', 'Bekir', 'Bela', 'Ben', 'Benedikt', 'Benjamin', 'Benno', 'Berend', 'Bernard', 'Bernd', 'Bernd-Dieter', 'Berndt', 'Bernfried', 'Bernhard', 'Bernt', 'Bernward', 'Bert', 'Berthold', 'Bertold', 'Bertram', 'Birger', 'Björn', 'Bodo', 'Bogdan', 'Boris', 'Branko', 'Brian', 'Bruno', 'Burckhard', 'Burghard', 'Burkard', 'Burkhard', 'Burkhardt',
        'Calogero', 'Carl', 'Carl-Heinz', 'Carlo', 'Carlos', 'Carmelo', 'Carsten', 'Celal', 'Cemal', 'Cemil', 'Cengiz', 'Cetin', 'Charles', 'Christian', 'Christof', 'Christoph', 'Christopher', 'Christos', 'Claas', 'Claudio', 'Claudius', 'Claus', 'Claus-Dieter', 'Claus-Peter', 'Clemens', 'Conrad', 'Constantin', 'Cord', 'Cornelius', 'Cosimo', 'Curt', 'Czeslaw',
        'Dagobert', 'Damian', 'Dan', 'Daniel', 'Daniele', 'Danilo', 'Danny', 'Darius', 'Dariusz', 'Darko', 'David', 'Denis', 'Dennis', 'Denny', 'Detlef', 'Detlev', 'Diedrich', 'Dierk', 'Dieter', 'Diethard', 'Diethelm', 'Diether', 'Dietmar', 'Dietrich', 'Dimitri', 'Dimitrios', 'Dino', 'Dirk', 'Ditmar', 'Dittmar', 'Dogan', 'Domenico', 'Dominic', 'Dominik', 'Donald', 'Dragan', 'Drago', 'Dursun', 'Dusan',
        'Eberhard', 'Eberhardt', 'Eckard', 'Eckart', 'Eckehard', 'Eckhard', 'Eckhardt', 'Eckhart', 'Edelbert', 'Edgar', 'Edmund', 'Eduard', 'Edward', 'Edwin', 'Egbert', 'Eggert', 'Egon', 'Ehrenfried', 'Ehrhard', 'Eitel', 'Ekkehard', 'Ekkehart', 'Ekrem', 'Elias', 'Elmar', 'Emanuel', 'Emil', 'Emin', 'Emmerich', 'Engelbert', 'Engin', 'Enno', 'Enrico', 'Enver', 'Ercan', 'Erdal', 'Erdogan', 'Erhard', 'Erhardt', 'Eric', 'Erich', 'Erik', 'Erkan', 'Ernest', 'Ernst', 'Ernst-August', 'Ernst-Dieter', 'Ernst-Otto', 'Erol', 'Erwin', 'Eugen', 'Evangelos', 'Ewald',
        'Fabian', 'Falk', 'Falko', 'Faruk', 'Fatih', 'Fedor', 'Felix', 'Ferdi', 'Ferdinand', 'Ferenc', 'Fernando', 'Filippo', 'Florian', 'Folker', 'Folkert', 'Francesco', 'Francis', 'Francisco', 'Franco', 'Franjo', 'Frank', 'Frank-Michael', 'Frank-Peter', 'Franz', 'Franz Josef', 'Franz-Josef', 'Franz-Peter', 'Franz-Xaver', 'Fred', 'Freddy', 'Frederic', 'Frederik', 'Fredi', 'Fredo', 'Fredy', 'Fridolin', 'Friedbert', 'Friedemann', 'Frieder', 'Friedhelm', 'Friedhold', 'Friedo', 'Friedrich', 'Friedrich-Karl', 'Friedrich-Wilhelm', 'Frithjof', 'Fritz',
        'Gabor', 'Gabriel', 'Gaetano', 'Gebhard', 'Geert', 'Georg', 'George', 'Georgios', 'Gerald', 'Gerard', 'Gerd', 'Gereon', 'Gerfried', 'Gerhard', 'Gerhardt', 'Gerhart', 'German', 'Gernot', 'Gero', 'Gerold', 'Gerolf', 'Gert', 'Gerwin', 'Gilbert', 'Gino', 'Giorgio', 'Giovanni', 'Gisbert', 'Giuseppe', 'Goran', 'Gordon', 'Gottfried', 'Gotthard', 'Gotthilf', 'Gotthold', 'Gottlieb', 'Gottlob', 'Gregor', 'Grzegorz', 'Guenter', 'Guenther', 'Guido', 'Guiseppe', 'Gunar', 'Gundolf', 'Gunnar', 'Gunter', 'Gunther', 'Guntram', 'Gustav', 'Götz', 'Günter', 'Günther',
        'H.-Dieter', 'Hagen', 'Hajo', 'Hakan', 'Halil', 'Hannes', 'Hanni', 'Hanno', 'Hanns', 'Hans', 'Hans D.', 'Hans Dieter', 'Hans Georg', 'Hans Josef', 'Hans Jörg', 'Hans Jürgen', 'Hans Peter', 'Hans-Adolf', 'Hans-Albert', 'Hans-Bernd', 'Hans-Christian', 'Hans-Detlef', 'Hans-Dieter', 'Hans-Dietrich', 'Hans-Eberhard', 'Hans-Erich', 'Hans-Friedrich', 'Hans-Georg', 'Hans-Gerd', 'Hans-Gerhard', 'Hans-Günter', 'Hans-Günther', 'Hans-H.', 'Hans-Heinrich', 'Hans-Helmut', 'Hans-Henning', 'Hans-Herbert', 'Hans-Hermann', 'Hans-Hinrich', 'Hans-J.', 'Hans-Joachim', 'Hans-Jochen', 'Hans-Josef', 'Hans-Jörg', 'Hans-Jürgen', 'Hans-Karl', 'Hans-Ludwig', 'Hans-Martin', 'Hans-Michael', 'Hans-Otto', 'Hans-Peter', 'Hans-Rainer', 'Hans-Rudolf', 'Hans-Theo', 'Hans-Ulrich', 'Hans-Uwe', 'Hans-Walter', 'Hans-Werner', 'Hans-Wilhelm', 'Hans-Willi', 'Hans-Wolfgang', 'Hansgeorg', 'Hansjoachim', 'Hansjörg', 'Hansjürgen', 'Hanspeter', 'Harald', 'Hardy', 'Harm', 'Harold', 'Harri', 'Harro', 'Harry', 'Hartmut', 'Hartmuth', 'Hartwig', 'Hasan', 'Hassan', 'Hasso', 'Heiko', 'Heimo', 'Heiner', 'Heinfried', 'Heini', 'Heino', 'Heinrich', 'Heinz', 'Heinz Dieter', 'Heinz-Dieter', 'Heinz-Georg', 'Heinz-Gerd', 'Heinz-Günter', 'Heinz-Günther', 'Heinz-Joachim', 'Heinz-Josef', 'Heinz-Jürgen', 'Heinz-Otto', 'Heinz-Peter', 'Heinz-Walter', 'Heinz-Werner', 'Heinz-Wilhelm', 'Heinz-Willi', 'Helfried', 'Helge', 'Hellmut', 'Hellmuth', 'Helmar', 'Helmut', 'Helmuth', 'Hendrik', 'Henner', 'Henning', 'Henrik', 'Henry', 'Henryk', 'Herbert', 'Heribert', 'Hermann', 'Hermann Josef', 'Hermann-Josef', 'Herrmann', 'Herwig', 'Hilmar', 'Hinrich', 'Holger', 'Holm', 'Horst', 'Horst-Dieter', 'Horst-Günter', 'Horst-Peter', 'Hubert', 'Hubertus', 'Hugo', 'Hüseyin',
        'Ian', 'Ibrahim', 'Ignatz', 'Ignaz', 'Igor', 'Ilhan', 'Ilias', 'Ilija', 'Ilja', 'Immo', 'Imre', 'Ingbert', 'Ingmar', 'Ingo', 'Ingolf', 'Ioannis', 'Isidor', 'Ismail', 'Ismet', 'Istvan', 'Ivan', 'Ivo', 'Iwan',
        'Jacek', 'Jacob', 'Jakob', 'James', 'Jan', 'Jan-Peter', 'Janko', 'Jann', 'Janos', 'Janus', 'Janusz', 'Jaroslav', 'Jaroslaw', 'Jens', 'Jens-Peter', 'Jens-Uwe', 'Jerzy', 'Jiri', 'Joachim', 'Jobst', 'Jochem', 'Jochen', 'Joerg', 'Johan', 'Johann', 'Johannes', 'John', 'Jonas', 'Jonas', 'Jonathan', 'Jorge', 'Jose', 'Josef', 'Joseph', 'Josip', 'Jost', 'José', 'Jovan', 'Jozef', 'Juan', 'Juergen', 'Julian', 'Julius', 'Juri', 'Jurij', 'Justus', 'Jörg', 'Jörg-Peter', 'Jörgen', 'Jörn', 'Jürgen',
        'Kai-Uwe', 'Kamil', 'Karl', 'Karl Heinz', 'Karl-August', 'Karl-Dieter', 'Karl-Ernst', 'Karl-Friedrich', 'Karl-Georg', 'Karl-Hans', 'Karl-Heinrich', 'Karl-Heinz', 'Karl-Hermann', 'Karl-Josef', 'Karl-Jürgen', 'Karl-Ludwig', 'Karl-Otto', 'Karl-Peter', 'Karl-Werner', 'Karl-Wilhelm', 'Karlfried', 'Karlheinz', 'Karsten', 'Kasimir', 'Kaspar', 'Kay-Uwe', 'Kazim', 'Kemal', 'Kenan', 'Kenneth', 'Kevin', 'Kilian', 'Klaas', 'Klaus', 'Klaus Dieter', 'Klaus Peter', 'Klaus-D.', 'Klaus-Dieter', 'Klaus-Günter', 'Klaus-Jürgen', 'Klaus-Michael', 'Klaus-Peter', 'Klaus-Ulrich', 'Klaus-Werner', 'Klemens', 'Knud', 'Knut', 'Konrad', 'Konstantin', 'Konstantinos', 'Korbinian', 'Kornelius', 'Kristian', 'Krzysztof', 'Kunibert', 'Kuno', 'Kurt',
        'Ladislaus', 'Lambert', 'Lars', 'Laszlo', 'Laurenz', 'Leander', 'Leif', 'Leo', 'Leon', 'Leonard', 'Leonardo', 'Leonhard', 'Leonid', 'Leopold', 'Leszek', 'Linus', 'Lorenz', 'Lorenzo', 'Lothar', 'Louis', 'Luciano', 'Ludger', 'Ludwig', 'Luigi', 'Luis', 'Lukas', 'Lutz',
        'Magnus', 'Mahmoud', 'Mahmut', 'Maik', 'Malte', 'Manfred', 'Manuel', 'Marc', 'Marcel', 'Marco', 'Marcus', 'Marek', 'Marian', 'Marijan', 'Mario', 'Marius', 'Mariusz', 'Mark', 'Marko', 'Markus', 'Marten', 'Martin', 'Marvin', 'Massimo', 'Mathias', 'Mato', 'Matteo', 'Matthias', 'Matthäus', 'Mattias', 'Maurice', 'Maurizio', 'Max', 'Maxim', 'Maximilian', 'Mehdi', 'Mehmet', 'Meik', 'Meinhard', 'Meinolf', 'Meinrad', 'Mesut', 'Metin', 'Micha', 'Michael', 'Michail', 'Michel', 'Miguel', 'Mijo', 'Mike', 'Mikhail', 'Milan', 'Milos', 'Miodrag', 'Mirco', 'Mirko', 'Miroslav', 'Miroslaw', 'Mohamed', 'Mohammad', 'Mohammed', 'Moritz', 'Muharrem', 'Murat', 'Mustafa', 'Muzaffer',
        'Necati', 'Nick', 'Nico', 'Nicolai', 'Nicolas', 'Nicolaus', 'Niels', 'Niklas', 'Niko', 'Nikola', 'Nikolai', 'Nikolaj', 'Nikolaos', 'Nikolas', 'Nikolaus', 'Nils', 'Norbert', 'Norman', 'Nurettin', 'Nuri',
        'Olaf', 'Ole', 'Oliver', 'Orhan', 'Ortwin', 'Oscar', 'Oskar', 'Osman', 'Oswald', 'Oswin', 'Otfried', 'Othmar', 'Otmar', 'Ottfried', 'Ottmar', 'Otto', 'Ottokar', 'Ottomar',
        'Paolo', 'Pascal', 'Pasquale', 'Patric', 'Patrick', 'Patrik', 'Paul', 'Paul-Gerhard', 'Paul-Heinz', 'Paulo', 'Pavel', 'Pawel', 'Pedro', 'Peer', 'Pero', 'Petar', 'Peter', 'Peter-Michael', 'Petros', 'Philip', 'Philipp', 'Philippe', 'Phillip', 'Pierre', 'Pietro', 'Piotr', 'Pirmin', 'Pius',
        'Rafael', 'Raik', 'Raimund', 'Rainer', 'Ralf', 'Ralf-Dieter', 'Ralf-Peter', 'Ralph', 'Ramazan', 'Ramon', 'Randolf', 'Raphael', 'Raymond', 'Raymund', 'Recep', 'Reginald', 'Reimar', 'Reimer', 'Reimund', 'Reinald', 'Reiner', 'Reinhard', 'Reinhardt', 'Reinhart', 'Reinhold', 'Remo', 'Renato', 'Rene', 'René', 'Reza', 'Ricardo', 'Richard', 'Rico', 'Rigo', 'Riza', 'Robby', 'Robert', 'Roberto', 'Robin', 'Rocco', 'Rochus', 'Roderich', 'Roger', 'Roland', 'Rolf', 'Rolf-Dieter', 'Rolf-Peter', 'Roman', 'Romuald', 'Ron', 'Ronald', 'Ronny', 'Rouven', 'Roy', 'Ruben', 'Rudi', 'Rudolf', 'Rudolph', 'Rupert', 'Ryszard', 'Rüdiger',
        'Saban', 'Sabri', 'Sahin', 'Salih', 'Salvatore', 'Sami', 'Samir', 'Samuel', 'Sandor', 'Sandro', 'Sebastian', 'Sebastiano', 'Sedat', 'Selim', 'Senol', 'Sepp', 'Serge', 'Sergei', 'Sergej', 'Sergio', 'Severin', 'Siegbert', 'Siegfried', 'Sieghard', 'Siegmar', 'Siegmund', 'Siegward', 'Sigfried', 'Sigismund', 'Sigmar', 'Sigmund', 'Sigurd', 'Silvester', 'Silvio', 'Simon', 'Slavko', 'Slawomir', 'Slobodan', 'Stanislaus', 'Stanislav', 'Stanislaw', 'Stavros', 'Stefan', 'Stefano', 'Steffen', 'Stephan', 'Stephen', 'Steve', 'Steven', 'Stjepan', 'Sven', 'Swen', 'Sylvester', 'Sylvio', 'Sönke', 'Sören', 'Sükrü', 'Süleyman',
        'Tadeusz', 'Tassilo', 'Thaddäus', 'Theo', 'Theobald', 'Theodor', 'Theodoros', 'Thies', 'Thilo', 'Thomas', 'Thoralf', 'Thorben', 'Thorsten', 'Tibor', 'Till', 'Tillmann', 'Tilman', 'Tilmann', 'Tilo', 'Tim', 'Timm', 'Timo', 'Tino', 'Tobias', 'Tom', 'Tomas', 'Tomasz', 'Tomislav', 'Toni', 'Tony', 'Toralf', 'Torben', 'Torsten', 'Traugott',
        'Udo', 'Ulf', 'Uli', 'Ullrich', 'Ulrich', 'Urban', 'Urs', 'Utz', 'Uwe',
        'Vadim', 'Valentin', 'Valerij', 'Vassilios', 'Veit', 'Veli', 'Victor', 'Viktor', 'Vincent', 'Vincenzo', 'Vinko', 'Vinzenz', 'Vitali', 'Vito', 'Vittorio', 'Vitus', 'Vladimir', 'Vlado', 'Volker', 'Volkhard', 'Volkmar',
        'Waldemar', 'Walfried', 'Walter', 'Walther', 'Wenzel', 'Werner', 'Wieland', 'Wieslaw', 'Wigbert', 'Wilfried', 'Wilhelm', 'Willfried', 'Willi', 'William', 'Willibald', 'Willibert', 'Willy', 'Winfried', 'Witold', 'Wladimir', 'Wojciech', 'Woldemar', 'Wolf', 'Wolf-Dieter', 'Wolf-Dietrich', 'Wolf-Rüdiger', 'Wolfgang', 'Wolfhard', 'Wolfram', 'Wulf',
        'Xaver',
        'Yilmaz', 'Yusuf',
        'Zbigniew', 'Zdravko', 'Zeki', 'Zeljko', 'Zenon', 'Zlatko', 'Zoltan', 'Zoran',
    );

    // From http://de.wiktionary.org/wiki/Verzeichnis:Deutsch/Liste_der_h%C3%A4ufigsten_weiblichen_Vornamen_Deutschlands
    protected static $firstNameFemale = array(
        'Adele', 'Adelgunde', 'Adelheid', 'Adelinde', 'Adeline', 'Adina', 'Adolfine', 'Adriana', 'Adriane', 'Aenne', 'Änne', 'Agata', 'Agatha', 'Agathe', 'Agnes', 'Agnieszka', 'Albertine', 'Albina', 'Aleksandra', 'Alena', 'Alexa', 'Alexandra', 'Alice', 'Alicia', 'Alicja', 'Alida', 'Alina', 'Aline', 'Alla', 'Alma', 'Almut', 'Almuth', 'Aloisia', 'Alwina', 'Alwine', 'Amalia', 'Amalie', 'Amanda', 'Amelie', 'Ana', 'Anastasia', 'Andrea', 'Aneta', 'Anett', 'Anette', 'Angela', 'Angelica', 'Angelika', 'Angelina', 'Angelique', 'Anica', 'Anika', 'Anita', 'Anja', 'Anka', 'Anke', 'Ann', 'Ann-Kathrin', 'Anna', 'Anna-Lena', 'Anna-Luise', 'Anna-Maria', 'Anna-Marie', 'Annaliese', 'Annamaria', 'Anne', 'Anne-Kathrin', 'Anne-Katrin', 'Anne-Marie', 'Anne-Rose', 'Annedore', 'Annegret', 'Annegrete', 'Annekatrin', 'Anneke', 'Annelene', 'Anneli', 'Annelie', 'Annelies', 'Anneliese', 'Annelise', 'Annelore', 'Annemarie', 'Annemie', 'Annerose', 'Annett', 'Annette', 'Anni', 'Annie', 'Annika', 'Annita', 'Anny', 'Antje', 'Antoinette', 'Antonia', 'Antonie', 'Antonietta', 'Antonina', 'Apollonia', 'Ariane', 'Arzu', 'Asta', 'Astrid', 'Augusta', 'Auguste', 'Aurelia', 'Aynur', 'Ayse', 'Aysel', 'Ayten',
        'Babett', 'Babette', 'Barbara', 'Beata', 'Beate', 'Beatrice', 'Beatrix', 'Belinda', 'Benita', 'Berit', 'Bernadette', 'Bernhardine', 'Berta', 'Bertha', 'Betina', 'Betti', 'Bettina', 'Betty', 'Bianca', 'Bianka', 'Birgid', 'Birgit', 'Birgitt', 'Birgitta', 'Birte', 'Birthe', 'Blanka', 'Bozena', 'Branka', 'Brigitta', 'Brigitte', 'Brit', 'Brita', 'Britt', 'Britta', 'Brunhild', 'Brunhilde', 'Bruni', 'Bärbel',
        'Camilla', 'Canan', 'Caren', 'Carin', 'Carina', 'Carla', 'Carmela', 'Carmen', 'Carmine', 'Carola', 'Carolin', 'Carolina', 'Caroline', 'Caterina', 'Catharina', 'Catherine', 'Cathleen', 'Cathrin', 'Catrin', 'Cecilia', 'Centa', 'Chantal', 'Charlotte', 'Christa', 'Christa-Maria', 'Christel', 'Christiana', 'Christiane', 'Christin', 'Christina', 'Christine', 'Christl', 'Cilli', 'Cilly', 'Cindy', 'Claire', 'Clara', 'Clarissa', 'Claudia', 'Cläre', 'Concetta', 'Conny', 'Constance', 'Constanze', 'Cora', 'Cordula', 'Corina', 'Corinna', 'Corinne', 'Cornelia', 'Cosima', 'Cristina', 'Cynthia', 'Cäcilia', 'Cäcilie',
        'Dagmar', 'Dajana', 'Damaris', 'Dana', 'Danica', 'Daniela', 'Danielle', 'Danuta', 'Daria', 'Deborah', 'Delia', 'Denise', 'Desiree', 'Diana', 'Diane', 'Dietlind', 'Dietlinde', 'Dina', 'Dolores', 'Donata', 'Dora', 'Doreen', 'Dorina', 'Doris', 'Dorit', 'Dorle', 'Dorota', 'Dorothe', 'Dorothea', 'Dorothee', 'Dragica', 'Dunja', 'Dörte', 'Dörthe',
        'Edda', 'Edelgard', 'Edeltraud', 'Edeltraut', 'Edeltrud', 'Edit', 'Edith', 'Editha', 'Ehrentraud', 'Eileen', 'Ekaterina', 'Elena', 'Eleni', 'Elenore', 'Eleonora', 'Eleonore', 'Elfi', 'Elfie', 'Elfriede', 'Elif', 'Elisa', 'Elisabet', 'Elisabeth', 'Elise', 'Elizabeth', 'Elke', 'Ella', 'Ellen', 'Elli', 'Ellinor', 'Elly', 'Elma', 'Elsa', 'Elsbeth', 'Else', 'Elvira', 'Elwira', 'Elzbieta', 'Emilia', 'Emilie', 'Emine', 'Emma', 'Emmi', 'Emmy', 'Erdmute', 'Erica', 'Erika', 'Erna', 'Ernestine', 'Ester', 'Esther', 'Etta', 'Eugenia', 'Eugenie', 'Eva', 'Eva-Maria', 'Eva-Marie', 'Evamaria', 'Evangelia', 'Evelin', 'Eveline', 'Evelyn', 'Evelyne', 'Evi', 'Ewa',
        'Fabienne', 'Fadime', 'Fanny', 'Fatima', 'Fatma', 'Felicia', 'Felicitas', 'Felizitas', 'Filiz', 'Flora', 'Florence', 'Florentine', 'Franca', 'Francesca', 'Francoise', 'Franka', 'Franziska', 'Frauke', 'Frederike', 'Freia', 'Freya', 'Frida', 'Frieda', 'Friedericke', 'Friederike', 'Friedhilde', 'Friedl', 'Friedlinde',
        'Gabi', 'Gabriela', 'Gabriele', 'Gabriella', 'Gaby', 'Galina', 'Genoveva', 'Georgia', 'Georgine', 'Geraldine', 'Gerda', 'Gerdi', 'Gerhild', 'Gerlind', 'Gerlinde', 'Gerta', 'Gerti', 'Gertraud', 'Gertraude', 'Gertraut', 'Gertrud', 'Gertrude', 'Gesa', 'Gesche', 'Gesine', 'Geza', 'Giesela', 'Gilda', 'Gina', 'Giovanna', 'Gisa', 'Gisela', 'Gislinde', 'Gitta', 'Gitte', 'Giuseppina', 'Gloria', 'Gordana', 'Grazyna', 'Greta', 'Gretchen', 'Grete', 'Gretel', 'Gretl', 'Grit', 'Gudrun', 'Gudula', 'Gunda', 'Gundel', 'Gundi', 'Gundula', 'Gunhild', 'Gusti', 'Gönül', 'Gülay', 'Gülsen', 'Gülten',
        'Halina', 'Hanife', 'Hanna', 'Hannah', 'Hannchen', 'Hanne', 'Hanne-Lore', 'Hannelore', 'Hanny', 'Harriet', 'Hatice', 'Hedda', 'Hedi', 'Hedwig', 'Hedy', 'Heide', 'Heide-Marie', 'Heidelinde', 'Heidelore', 'Heidemarie', 'Heiderose', 'Heidi', 'Heidrun', 'Heike', 'Helen', 'Helena', 'Helene', 'Helga', 'Hella', 'Helma', 'Helmtrud', 'Henni', 'Henny', 'Henri', 'Henriette', 'Henrike', 'Herlinde', 'Herma', 'Hermine', 'Herta', 'Hertha', 'Hilda', 'Hildburg', 'Hilde', 'Hildegard', 'Hildegart', 'Hildegund', 'Hildegunde', 'Hilma', 'Hiltraud', 'Hiltrud', 'Hubertine', 'Hulda', 'Hülya',
        'Ida', 'Ildiko', 'Ilka', 'Ilona', 'Ilonka', 'Ilse', 'Imelda', 'Imke', 'Ina', 'Ines', 'Inga', 'Inge', 'Ingeborg', 'Ingeburg', 'Ingelore', 'Ingetraud', 'Ingetraut', 'Ingrid', 'Ingried', 'Inka', 'Inken', 'Inna', 'Insa', 'Ira', 'Irena', 'Irene', 'Irina', 'Iris', 'Irma', 'Irmela', 'Irmengard', 'Irmgard', 'Irmhild', 'Irmi', 'Irmingard', 'Irmtraud', 'Irmtraut', 'Irmtrud', 'Isa', 'Isabel', 'Isabell', 'Isabella', 'Isabelle', 'Isolde', 'Ivana', 'Ivanka', 'Ivonne', 'Iwona',
        'Jacqueline', 'Jadwiga', 'Jana', 'Jane', 'Janet', 'Janett', 'Janette', 'Janin', 'Janina', 'Janine', 'Janna', 'Jaqueline', 'Jasmin', 'Jasmina', 'Jeanette', 'Jeannette', 'Jeannine', 'Jelena', 'Jennifer', 'Jenny', 'Jessica', 'Jessika', 'Jo', 'Joana', 'Joanna', 'Johanna', 'Johanne', 'Jolanda', 'Jolanta', 'Jolanthe', 'Josefa', 'Josefine', 'Josephine', 'Judith', 'Julia', 'Juliana', 'Juliane', 'Julie', 'Justina', 'Justine', 'Jutta',
        'Karen', 'Karin', 'Karina', 'Karla', 'Karola', 'Karolin', 'Karolina', 'Karoline', 'Kata', 'Katalin', 'Katarina', 'Katarzyna', 'Katerina', 'Katharina', 'Katharine', 'Katherina', 'Kathi', 'Kathleen', 'Kathrin', 'Kathy', 'Kati', 'Katja', 'Katrin', 'Katy', 'Kerstin', 'Kira', 'Kirsten', 'Kirstin', 'Klara', 'Klaudia', 'Klothilde', 'Kläre', 'Konstanze', 'Kordula', 'Korinna', 'Kornelia', 'Kreszentia', 'Kreszenz', 'Kriemhild', 'Krista', 'Kristiane', 'Kristin', 'Kristina', 'Kristine', 'Krystyna', 'Kunigunda', 'Kunigunde', 'Käte', 'Käthe', 'Käthi',
        'Laila', 'Lara', 'Larissa', 'Laura', 'Lea', 'Leila', 'Lena', 'Lene', 'Leni', 'Leokadia', 'Leonie', 'Leonore', 'Leopoldine', 'Leyla', 'Lia', 'Liane', 'Lidia', 'Lidija', 'Lidwina', 'Liesa', 'Liesbeth', 'Lieschen', 'Liesel', 'Lieselotte', 'Lili', 'Lilian', 'Liliana', 'Liliane', 'Lilija', 'Lilli', 'Lilly', 'Lilo', 'Lina', 'Linda', 'Lioba', 'Lisa', 'Lisbeth', 'Liselotte', 'Lisette', 'Lissi', 'Lissy', 'Ljiljana', 'Ljubica', 'Ljudmila', 'Loni', 'Lore', 'Loretta', 'Lotte', 'Lotti', 'Louise', 'Lucia', 'Lucie', 'Ludmila', 'Ludmilla', 'Ludwina', 'Luisa', 'Luise', 'Luitgard', 'Luka', 'Luzia', 'Luzie', 'Lydia',
        'Madeleine', 'Madlen', 'Magarete', 'Magda', 'Magdalena', 'Magdalene', 'Magret', 'Magrit', 'Maike', 'Maja', 'Malgorzata', 'Mandy', 'Manja', 'Manuela', 'Mara', 'Marcella', 'Mareen', 'Mareike', 'Mareile', 'Maren', 'Marga', 'Margaret', 'Margareta', 'Margarete', 'Margaretha', 'Margarethe', 'Margarita', 'Margit', 'Margita', 'Margitta', 'Margot', 'Margret', 'Margrit', 'Maria', 'Maria-Luise', 'Maria-Theresia', 'Mariana', 'Marianna', 'Marianne', 'Marica', 'Marie', 'Marie-Louise', 'Marie-Luise', 'Marie-Theres', 'Marie-Therese', 'Mariechen', 'Mariele', 'Marieluise', 'Marietta', 'Marija', 'Marika', 'Marina', 'Mariola', 'Marion', 'Marisa', 'Marit', 'Marita', 'Maritta', 'Marjan', 'Marleen', 'Marlen', 'Marlene', 'Marlies', 'Marliese', 'Marlis', 'Marta', 'Martha', 'Martina', 'Martine', 'Mary', 'Marzena', 'Mathilde', 'Maya', 'Mechthild', 'Mechthilde', 'Mechtild', 'Meike', 'Melanie', 'Melissa', 'Melita', 'Melitta', 'Meral', 'Mercedes', 'Meryem', 'Meta', 'Mia', 'Michaela', 'Michaele', 'Michelle', 'Milena', 'Milica', 'Milka', 'Mina', 'Minna', 'Mira', 'Mirella', 'Miriam', 'Mirja', 'Mirjam', 'Mirjana', 'Miroslawa', 'Mona', 'Monica', 'Monika', 'Monique', 'Monja', 'Myriam',
        'Nada', 'Nadeschda', 'Nadeshda', 'Nadia', 'Nadin', 'Nadine', 'Nadja', 'Nancy', 'Natali', 'Natalia', 'Natalie', 'Natalija', 'Natalja', 'Natascha', 'Nathalie', 'Nelli', 'Nelly', 'Nermin', 'Nevenka', 'Nicole', 'Nina', 'Nora', 'Norma', 'Notburga', 'Nuran', 'Nuray', 'Nurten',
        'Oda', 'Olav', 'Olena', 'Olga', 'Olivia', 'Ortrud', 'Ortrun', 'Ottilie', 'Oxana',
        'Pamela', 'Paola', 'Pascale', 'Patricia', 'Patrizia', 'Paula', 'Paulina', 'Pauline', 'Peggy', 'Petra', 'Philomena', 'Pia', 'Polina', 'Priska',
        'Rabea', 'Radmila', 'Rahel', 'Raisa', 'Raissa', 'Ramona', 'Raphaela', 'Rebecca', 'Rebekka', 'Regina', 'Regine', 'Reingard', 'Reinhild', 'Reinhilde', 'Rena', 'Renata', 'Renate', 'Reni', 'Resi', 'Ria', 'Ricarda', 'Rita', 'Romana', 'Romy', 'Rosa', 'Rosa-Maria', 'Rosalia', 'Rosalie', 'Rosalinde', 'Rose', 'Rose-Marie', 'Rosel', 'Roselinde', 'Rosemarie', 'Rosi', 'Rosina', 'Rosita', 'Rosl', 'Rosmarie', 'Roswita', 'Roswitha', 'Rotraud', 'Rotraut', 'Ruth', 'Ruthild',
        'Sabina', 'Sabine', 'Sabrina', 'Samira', 'Sandra', 'Sandy', 'Sara', 'Sarah', 'Sarina', 'Saskia', 'Selma', 'Semra', 'Senta', 'Serpil', 'Sevim', 'Sibel', 'Sibilla', 'Sibille', 'Sibylla', 'Sibylle', 'Sieglinde', 'Siegrid', 'Siegried', 'Siegrun', 'Siglinde', 'Sigrid', 'Sigrun', 'Silja', 'Silke', 'Silva', 'Silvana', 'Silvia', 'Simona', 'Simone', 'Sina', 'Sinaida', 'Slavica', 'Sofia', 'Sofie', 'Solveig', 'Songül', 'Sonia', 'Sonja', 'Sophia', 'Sophie', 'Stefani', 'Stefania', 'Stefanie', 'Steffi', 'Stella', 'Stephanie', 'Stilla', 'Susan', 'Susana', 'Susann', 'Susanna', 'Susanne', 'Suse', 'Susi', 'Suzanne', 'Svea', 'Svenja', 'Svetlana', 'Swantje', 'Swetlana', 'Sybilla', 'Sybille', 'Sylke', 'Sylvana', 'Sylvia', 'Sylvie', 'Sylwia',
        'Tabea', 'Tamara', 'Tania', 'Tanja', 'Tatiana', 'Tatjana', 'Telse', 'Teresa', 'Thea', 'Theda', 'Thekla', 'Theodora', 'Theres', 'Theresa', 'Therese', 'Theresia', 'Tilly', 'Tina', 'Traude', 'Traudel', 'Traudl', 'Traute', 'Trude', 'Trudel', 'Trudi', 'Tülay', 'Türkan',
        'Ulla', 'Ulrike', 'Undine', 'Ursel', 'Ursula', 'Urszula', 'Urte', 'Uschi', 'Uta', 'Ute',
        'Valentina', 'Valentine', 'Valeri', 'Valeria', 'Valerie', 'Valeska', 'Vanessa', 'Vera', 'Verena', 'Veronica', 'Veronika', 'Veronique', 'Vesna', 'Victoria', 'Viktoria', 'Viola', 'Violetta', 'Virginia', 'Viviane',
        'Walburga', 'Waldtraut', 'Walentina', 'Walli', 'Wally', 'Waltraud', 'Waltraut', 'Waltrud', 'Wanda', 'Wencke', 'Wendelin', 'Wenke', 'Wera', 'Wibke', 'Wiebke', 'Wilfriede', 'Wilhelmine', 'Wilma', 'Wiltrud',
        'Xenia',
        'Yasemin', 'Yasmin', 'Yvette', 'Yvonne',
        'Zdenka', 'Zehra', 'Zenta', 'Zeynep', 'Zita', 'Zofia',
    );

    protected static $lastName = array(
        'Ackermann', 'Adler', 'Adolph', 'Albers', 'Anders', 'Atzler', 'Aumann', 'Austermühle',
        'Bachmann', 'Bähr', 'Bärer', 'Barkholz', 'Barth', 'Bauer', 'Baum', 'Becker', 'Beckmann', 'Beer', 'Beier', 'Bender', 'Benthin', 'Berger', 'Beyer', 'Bien', 'Biggen', 'Binner', 'Birnbaum', 'Bloch', 'Blümel', 'Bohlander', 'Bonbach', 'Bolander', 'Bolnbach', 'Bolzmann', 'Börner', 'Bohnbach', 'Boucsein', 'Briemer', 'Bruder', 'Buchholz', 'Budig', 'Butte',
        'Carsten', 'Caspar', 'Christoph', 'Cichorius', 'Conradi',
        'Davids', 'Dehmel', 'Dickhard', 'Dietz', 'Dippel', 'Ditschlerin', 'Dobes', 'Döhn', 'Döring', 'Dörr', 'Dörschner', 'Dowerg', 'Drewes', 'Drub', 'Drubin', 'Dussen van',
        'Eberhardt', 'Ebert', 'Eberth', 'Eckbauer', 'Ehlert', 'Eigenwillig', 'Eimer', 'Ernst', 'Etzler', 'Etzold',
        'Faust', 'Fechner', 'Fiebig', 'Finke', 'Fischer', 'Flantz', 'Fliegner', 'Förster', 'Franke', 'Freudenberger', 'Fritsch', 'Fröhlich',
        'Gehringer', 'Geisel', 'Geisler', 'Geißler', 'Gerlach', 'Gertz', 'Gierschner', 'Gieß', 'Girschner', 'Gnatz', 'Gorlitz', 'Gotthard', 'Graf', 'Grein Groth', 'Gröttner', 'Gude', 'Gunpf', 'Gumprich', 'Gute', 'Gutknecht',
        'Haase', 'Haering', 'Hänel', 'Häring', 'Hahn', 'Hamann', 'Hande', 'Harloff', 'Hartmann', 'Hartung', 'Hauffer', 'Hecker', 'Heidrich', 'Hein', 'Heinrich', 'Heintze', 'Heinz', 'Hellwig', 'Henck', 'Hendriks', 'Henk', 'Henschel', 'Hentschel', 'Hering', 'Hermann', 'Herrmann', 'Hermighausen', 'Hertrampf', 'Heser', 'Heß', 'Hesse', 'Hettner', 'Hethur', 'Heuser', 'Hiller', 'Heydrich', 'Höfig', 'Hofmann', 'Holsten', 'Holt', 'Holzapfel', 'Hölzenbecher', 'Hörle', 'Hövel', 'Hoffmann', 'Hornich', 'Hornig', 'Hübel', 'Huhn',
        'Jacob', 'Jacobi Jäckel', 'Jähn', 'Jäkel', 'Jäntsch', 'Jessel', 'Jockel', 'Johann', 'Jopich', 'Junck', 'Juncken', 'Jungfer', 'Junitz', 'Junk', 'Junken', 'Jüttner',
        'Kabus', 'Kade', 'Käster', 'Kallert', 'Kambs', 'Karge', 'Karz', 'Kaul', 'Kensy', 'Keudel', 'Killer', 'Kitzmann', 'Klapp', 'Klemm', 'Klemt', 'Klingelhöfer', 'Klotz', 'Knappe', 'Kobelt', 'Koch', 'Koch II', 'Köhler', 'Köster', 'Kohl', 'Kostolzin', 'Kramer', 'Kranz', 'Krause', 'Kraushaar', 'Krebs', 'Krein', 'Kreusel', 'Kroker', 'Kruschwitz', 'Kuhl', 'Kühnert', 'Kusch',
        'Lachmann', 'Ladeck', 'Lange', 'Langern', 'Lehmann', 'Liebelt', 'Lindau', 'Lindner', 'Linke', 'Löchel', 'Löffler', 'Loos', 'Lorch', 'Losekann', 'Löwer', 'Lübs',
        'Mälzer', 'Mangold', 'Mans', 'Margraf', 'Martin', 'Matthäi', 'Meister', 'Mende', 'Mentzel', 'Metz', 'Meyer', 'Mielcarek', 'Mies', 'Misicher', 'Mitschke', 'Mohaupt', 'Mosemann', 'Möchlichen', 'Mude', 'Mühle', 'Mülichen', 'Müller',
        'Naser', 'Nerger', 'Nette', 'Neureuther', 'Neuschäfer', 'Niemeier', 'Noack', 'Nohlmans',
        'Oderwald', 'Oestrovsky', 'Ortmann', 'Otto',
        'Paffrath', 'Pärtzelt', 'Patberg', 'Pechel', 'Pergande', 'Peukert', 'Pieper', 'Plath', 'Pohl', 'Pölitz', 'Preiß', 'Pruschke', 'Putz',
        'Rädel', 'Radisch', 'Reichmann', 'Reinhardt', 'Reising', 'Renner', 'Reuter', 'Riehl', 'Ring', 'Ritter', 'Rogge', 'Rogner', 'Rohleder', 'Röhrdanz', 'Röhricht', 'Roht', 'Römer', 'Rörricht', 'Rose', 'Rosemann', 'Rosenow', 'Roskoth', 'Rudolph', 'Ruppersberger', 'Ruppert', 'Rust',
        'Sager', 'Salz', 'Säuberlich', 'Sauer', 'Schaaf', 'Schacht', 'Schäfer', 'Scheel', 'Scheibe', 'Schenk', 'Scheuermann', 'Schinke', 'Schleich', 'Schleich', 'auch Schlauchin', 'Schlosser', 'Schmidt', 'Schmidtke', 'Schmiedecke', 'Schmiedt', 'Schönland', 'Scholl', 'Scholtz', 'Scholz', 'Schomber', 'Schottin', 'Schuchhardt', 'Schüler', 'Schulz', 'Schuster', 'Schweitzer', 'Schwital', 'Segebahn', 'Seifert', 'Seidel', 'Seifert', 'Seip', 'Siering', 'Söding', 'Sölzer', 'Sontag', 'Sorgatz', 'Speer', 'Spieß', 'Stadelmann', 'Stahr', 'Staude', 'Steckel', 'Steinberg', 'Stey', 'Stiebitz', 'Stiffel', 'Stoll', 'Stolze', 'Striebitz', 'Stroh', 'Stumpf', 'Sucker', 'Süßebier',
        'Täsche', 'Textor', 'Thanel', 'Thies', 'Tintzmann', 'Tlustek', 'Trapp', 'Trommler', 'Tröst', 'Trub', 'Trüb', 'Trubin', 'Trupp', 'Tschentscher',
        'Ullmann', 'Ullrich',
        'van der Dussen', 'Vogt', 'Vollbrecht',
        'Wagenknecht', 'Wagner', 'Wähner', 'Walter', 'Warmer', 'Weihmann', 'Weimer', 'Weinhage', 'Weinhold', 'Weiß', 'Weitzel', 'Weller', 'Wende', 'Wernecke', 'Werner', 'Wesack', 'Wiek', 'Wieloch', 'Wilms', 'Wilmsen', 'Winkler', 'Wirth', 'Wohlgemut', 'Wulf', 'Wulff',
        'Zahn', 'Zänker', 'Ziegert', 'Zimmer', 'Zirme', 'Zobel', 'Zorbach',
    );

    protected static $titleMale = array('Herr', 'Dr.', 'Ing.', 'Dipl.-Ing.', 'Prof.', 'Univ.Prof.');
    protected static $titleFemale = array('Frau', 'Dr.', 'Ing.', 'Dipl.-Ing.', 'Prof.', 'Univ.Prof.');

    protected static $suffix = array('B.Sc.', 'B.A.', 'B.Eng.', 'MBA.');

    /**
     * @example 'PhD'
     */
    public static function suffix()
    {
        return static::randomElement(static::$suffix);
    }
}
=======
<?php

namespace Faker\Provider\de_DE;

class Person extends \Faker\Provider\Person
{
    protected static $maleNameFormats = array(
        '{{firstNameMale}} {{lastName}}',
        '{{firstNameMale}} {{lastName}}',
        '{{firstNameMale}} {{lastName}}',
        '{{firstNameMale}} {{lastName}}',
        '{{firstNameMale}} {{lastName}}-{{lastName}}',
        '{{titleMale}} {{firstNameMale}} {{lastName}}',
        '{{firstNameMale}} {{lastName}} {{suffix}}',
        '{{titleMale}} {{firstNameMale}} {{lastName}} {{suffix}}',
    );

    protected static $femaleNameFormats = array(
        '{{firstNameFemale}} {{lastName}}',
        '{{firstNameFemale}} {{lastName}}',
        '{{firstNameFemale}} {{lastName}}',
        '{{firstNameFemale}} {{lastName}}',
        '{{firstNameFemale}} {{lastName}}-{{lastName}}',
        '{{titleFemale}} {{firstNameFemale}} {{lastName}}',
        '{{firstNameFemale}} {{lastName}} {{suffix}}',
        '{{titleFemale}} {{firstNameFemale}} {{lastName}} {{suffix}}',
    );

    /**
         * Top 500 Names from a phone directory (6. January 2005)
         * {@link} From http://de.wiktionary.org/wiki/Verzeichnis:Deutsch/Liste_der_h%C3%A4ufigsten_m%C3%A4nnlichen_Vornamen_Deutschlands
         **/
    protected static $firstNameMale = array(
        'Achim', 'Adalbert', 'Adam', 'Adolf', 'Adrian', 'Ahmed', 'Ahmet', 'Albert', 'Albin', 'Albrecht', 'Alex', 'Alexander', 'Alfons', 'Alfred', 'Ali', 'Alois', 'Aloys', 'Alwin', 'Anatoli', 'Andre', 'Andreas', 'Andree', 'Andrej', 'Andrzej', 'André', 'Andy', 'Angelo', 'Ansgar', 'Anton', 'Antonio', 'Antonius', 'Armin', 'Arnd', 'Arndt', 'Arne', 'Arno', 'Arnold', 'Arnulf', 'Arthur', 'Artur', 'August', 'Axel',
        'Bastian', 'Benedikt', 'Benjamin', 'Benno', 'Bernard', 'Bernd', 'Berndt', 'Bernhard', 'Bert', 'Berthold', 'Bertram', 'Björn', 'Bodo', 'Bogdan', 'Boris', 'Bruno', 'Burghard', 'Burkhard',
        'Carl', 'Carlo', 'Carlos', 'Carsten', 'Christian', 'Christof', 'Christoph', 'Christopher', 'Christos', 'Claudio', 'Claus', 'Claus-Dieter', 'Claus-Peter', 'Clemens', 'Cornelius',
        'Daniel', 'Danny', 'Darius', 'David', 'Denis', 'Dennis', 'Detlef', 'Detlev', 'Dierk', 'Dieter', 'Diethard', 'Diethelm', 'Dietmar', 'Dietrich', 'Dimitri', 'Dimitrios', 'Dirk', 'Domenico', 'Dominik',
        'Eberhard', 'Eckard', 'Eckart', 'Eckehard', 'Eckhard', 'Eckhardt', 'Edgar', 'Edmund', 'Eduard', 'Edward', 'Edwin', 'Egbert', 'Egon', 'Ehrenfried', 'Ekkehard', 'Elmar', 'Emanuel', 'Emil', 'Engelbert', 'Enno', 'Enrico', 'Erhard', 'Eric', 'Erich', 'Erik', 'Ernst', 'Ernst-August', 'Erwin', 'Eugen', 'Ewald',
        'Fabian', 'Falk', 'Falko', 'Felix', 'Ferdinand', 'Florian', 'Francesco', 'Franco', 'Frank', 'Franz', 'Franz Josef', 'Franz-Josef', 'Fred', 'Fredi', 'Fridolin', 'Friedbert', 'Friedemann', 'Frieder', 'Friedhelm', 'Friedrich', 'Friedrich-Wilhelm', 'Fritz',
        'Gabriel', 'Gebhard', 'Georg', 'Georgios', 'Gerald', 'Gerd', 'Gerhard', 'Gernot', 'Gero', 'Gerold', 'Gert', 'Gilbert', 'Giovanni', 'Gisbert', 'Giuseppe', 'Gottfried', 'Gotthard', 'Gottlieb', 'Gregor', 'Guenter', 'Guido', 'Guiseppe', 'Gunnar', 'Gunter', 'Gunther', 'Gustav', 'Götz', 'Günter', 'Günther',
        'Hagen', 'Halil', 'Hannes', 'Hanni', 'Hanno', 'Hanns', 'Hans', 'Hans D.', 'Hans Dieter', 'Hans Georg', 'Hans Jürgen', 'Hans Peter', 'Hans-Christian', 'Hans-Dieter', 'Hans-Georg', 'Hans-Gerd', 'Hans-Günter', 'Hans-Günther', 'Hans-Heinrich', 'Hans-Hermann', 'Hans-J.', 'Hans-Joachim', 'Hans-Jochen', 'Hans-Josef', 'Hans-Jörg', 'Hans-Jürgen', 'Hans-Martin', 'Hans-Otto', 'Hans-Peter', 'Hans-Ulrich', 'Hans-Walter', 'Hans-Werner', 'Hans-Wilhelm', 'Hansjörg', 'Hanspeter', 'Harald', 'Hardy', 'Harri', 'Harro', 'Harry', 'Hartmut', 'Hartwig', 'Hasan', 'Heiko', 'Heiner', 'Heino', 'Heinrich', 'Heinz', 'Heinz-Dieter', 'Heinz-Georg', 'Heinz-Günter', 'Heinz-Joachim', 'Heinz-Josef', 'Heinz-Jürgen', 'Heinz-Peter', 'Heinz-Werner', 'Helfried', 'Helge', 'Hellmut', 'Hellmuth', 'Helmar', 'Helmut', 'Helmuth', 'Hendrik', 'Henning', 'Henrik', 'Henry', 'Henryk', 'Herbert', 'Heribert', 'Hermann', 'Hermann-Josef', 'Herwig', 'Hilmar', 'Hinrich', 'Holger', 'Horst', 'Horst-Dieter', 'Hubert', 'Hubertus', 'Hugo', 'Hüseyin',
        'Ibrahim', 'Ignaz', 'Igor', 'Ingo', 'Ingolf', 'Ismail', 'Ivan', 'Ivo',
        'Jakob', 'Jan', 'Janusz', 'Jens', 'Jens-Uwe', 'Joachim', 'Jochen', 'Johann', 'Johannes', 'John', 'Jonas', 'Jonas', 'Jose', 'Josef', 'Joseph', 'Josip', 'Jost', 'Juergen', 'Julian', 'Julius', 'Juri', 'Jörg', 'Jörn', 'Jürgen',
        'Kai-Uwe', 'Karl', 'Karl Heinz', 'Karl-Ernst', 'Karl-Friedrich', 'Karl-Heinrich', 'Karl-Heinz', 'Karl-Josef', 'Karl-Ludwig', 'Karl-Otto', 'Karl-Wilhelm', 'Karlheinz', 'Karsten', 'Kaspar', 'Kevin', 'Klaus', 'Klaus Dieter', 'Klaus Peter', 'Klaus-Dieter', 'Klaus-Jürgen', 'Klaus-Peter', 'Klemens', 'Knut', 'Konrad', 'Konstantin', 'Konstantinos', 'Kuno', 'Kurt',
        'Lars', 'Leo', 'Leonhard', 'Leonid', 'Leopold', 'Lorenz', 'Lothar', 'Ludger', 'Ludwig', 'Luigi', 'Lukas', 'Lutz',
        'Magnus', 'Maik', 'Malte', 'Manfred', 'Manuel', 'Marc', 'Marcel', 'Marco', 'Marcus', 'Marek', 'Marian', 'Mario', 'Marius', 'Mark', 'Marko', 'Markus', 'Martin', 'Mathias', 'Matthias', 'Max', 'Maximilian', 'Mehmet', 'Meinhard', 'Meinolf', 'Metin', 'Michael', 'Michel', 'Mike', 'Milan', 'Mirco', 'Mirko', 'Miroslav', 'Miroslaw', 'Mohamed', 'Moritz', 'Murat', 'Mustafa',
        'Nico', 'Nicolas', 'Niels', 'Nikola', 'Nikolai', 'Nikolaj', 'Nikolaos', 'Nikolaus', 'Nils', 'Norbert', 'Norman',
        'Olaf', 'Oliver', 'Ortwin', 'Oskar', 'Osman', 'Oswald', 'Otmar', 'Ottmar', 'Otto',
        'Pascal', 'Patrick', 'Paul', 'Peer', 'Peter', 'Philip', 'Philipp', 'Pierre', 'Pietro', 'Piotr',
        'Rafael', 'Raimund', 'Rainer', 'Ralf', 'Ralph', 'Ramazan', 'Raphael', 'Reimund', 'Reiner', 'Reinhard', 'Reinhardt', 'Reinhold', 'Rene', 'René', 'Richard', 'Rico', 'Robert', 'Roberto', 'Robin', 'Roger', 'Roland', 'Rolf', 'Rolf-Dieter', 'Roman', 'Ronald', 'Ronny', 'Rudi', 'Rudolf', 'Rupert', 'Rüdiger',
        'Salvatore', 'Samuel', 'Sandro', 'Sebastian', 'Sergej', 'Siegbert', 'Siegfried', 'Siegmar', 'Siegmund', 'Sigmund', 'Sigurd', 'Silvio', 'Simon', 'Stanislaw', 'Stefan', 'Steffen', 'Stephan', 'Steven', 'Sven', 'Swen', 'Sönke', 'Sören',
        'Theo', 'Theodor', 'Thilo', 'Thomas', 'Thorsten', 'Till', 'Tilo', 'Tim', 'Timo', 'Tino', 'Tobias', 'Tom', 'Toni', 'Torben', 'Torsten',
        'Udo', 'Ulf', 'Uli', 'Ullrich', 'Ulrich', 'Uwe',
        'Valentin', 'Veit', 'Victor', 'Viktor', 'Vincenzo', 'Vinzenz', 'Vitali', 'Vladimir', 'Volker', 'Volkmar',
        'Waldemar', 'Walter', 'Walther', 'Wenzel', 'Werner', 'Wieland', 'Wilfried', 'Wilhelm', 'Willi', 'William', 'Willibald', 'Willy', 'Winfried', 'Wladimir', 'Wolf', 'Wolf-Dieter', 'Wolfgang', 'Wolfram', 'Wulf',
        'Xaver',
        'Yusuf',
    );

    // From http://de.wiktionary.org/wiki/Verzeichnis:Deutsch/Liste_der_h%C3%A4ufigsten_weiblichen_Vornamen_Deutschlands
    protected static $firstNameFemale = array(
        'Adele', 'Adelheid', 'Agathe', 'Agnes', 'Alexandra', 'Alice', 'Alma', 'Almut', 'Aloisia', 'Alwine', 'Amalie', 'Ana', 'Anastasia', 'Andrea', 'Anett', 'Anette', 'Angela', 'Angelika', 'Anika', 'Anita', 'Anja', 'Anke', 'Anna', 'Anna-Maria', 'Anne', 'Annegret', 'Annelie', 'Annelies', 'Anneliese', 'Annelore', 'Annemarie', 'Annerose', 'Annett', 'Annette', 'Anni', 'Annika', 'Anny', 'Antje', 'Antonia', 'Antonie', 'Ariane', 'Astrid', 'Auguste', 'Ayse',
        'Babette', 'Barbara', 'Beate', 'Beatrice', 'Beatrix', 'Bernadette', 'Berta', 'Bettina', 'Betty', 'Bianca', 'Bianka', 'Birgit', 'Birgitt', 'Birgitta', 'Birte', 'Brigitta', 'Brigitte', 'Britta', 'Brunhild', 'Brunhilde', 'Bärbel',
        'Carina', 'Carla', 'Carmen', 'Carola', 'Carolin', 'Caroline', 'Cathrin', 'Catrin', 'Centa', 'Charlotte', 'Christa', 'Christel', 'Christiane', 'Christin', 'Christina', 'Christine', 'Christl', 'Cindy', 'Claudia', 'Conny', 'Constanze', 'Cordula', 'Corina', 'Corinna', 'Cornelia', 'Cäcilia', 'Cäcilie',
        'Dagmar', 'Dana', 'Daniela', 'Danuta', 'Denise', 'Diana', 'Dietlinde', 'Dora', 'Doreen', 'Doris', 'Dorit', 'Dorothea', 'Dorothee', 'Dunja', 'Dörte',
        'Edda', 'Edelgard', 'Edeltraud', 'Edeltraut', 'Edith', 'Elena', 'Eleonore', 'Elfi', 'Elfriede', 'Elisabeth', 'Elise', 'Elke', 'Ella', 'Ellen', 'Elli', 'Elly', 'Elsa', 'Elsbeth', 'Else', 'Elvira', 'Emilia', 'Emilie', 'Emine', 'Emma', 'Emmi', 'Emmy', 'Erika', 'Erna', 'Ernestine', 'Esther', 'Eugenie', 'Eva', 'Eva-Maria', 'Evelin', 'Eveline', 'Evelyn', 'Evelyne', 'Evi', 'Ewa',
        'Fatma', 'Felicitas', 'Franziska', 'Frauke', 'Frida', 'Frieda', 'Friederike',
        'Gabi', 'Gabriela', 'Gabriele', 'Gaby', 'Galina', 'Gerda', 'Gerhild', 'Gerlinde', 'Gerta', 'Gerti', 'Gertraud', 'Gertraude', 'Gertrud', 'Gertrude', 'Gesa', 'Gesine', 'Giesela', 'Gisela', 'Gitta', 'Grete', 'Gretel', 'Grit', 'Gudrun', 'Gunda', 'Gundula',
        'Halina', 'Hanna', 'Hanne', 'Hannelore', 'Hatice', 'Hedi', 'Hedwig', 'Heide', 'Heidemarie', 'Heiderose', 'Heidi', 'Heidrun', 'Heike', 'Helen', 'Helena', 'Helene', 'Helga', 'Hella', 'Helma', 'Henny', 'Henri', 'Henriette', 'Hermine', 'Herta', 'Hertha', 'Hilda', 'Hilde', 'Hildegard', 'Hiltrud',
        'Ida', 'Ilka', 'Ilona', 'Ilse', 'Imke', 'Ina', 'Ines', 'Inga', 'Inge', 'Ingeborg', 'Ingeburg', 'Ingelore', 'Ingrid', 'Inka', 'Inna', 'Irena', 'Irene', 'Irina', 'Iris', 'Irma', 'Irmgard', 'Irmhild', 'Irmtraud', 'Irmtraut', 'Isa', 'Isabel', 'Isabell', 'Isabella', 'Isabelle', 'Isolde', 'Ivonne',
        'Jacqueline', 'Jana', 'Janet', 'Janina', 'Janine', 'Jaqueline', 'Jasmin', 'Jeanette', 'Jeannette', 'Jennifer', 'Jenny', 'Jessica', 'Joanna', 'Johanna', 'Johanne', 'Jolanta', 'Josefa', 'Josefine', 'Judith', 'Julia', 'Juliane', 'Jutta',
        'Karen', 'Karin', 'Karina', 'Karla', 'Karola', 'Karolina', 'Karoline', 'Katarina', 'Katharina', 'Kathleen', 'Kathrin', 'Kati', 'Katja', 'Katrin', 'Kerstin', 'Kirsten', 'Kirstin', 'Klara', 'Klaudia', 'Konstanze', 'Kornelia', 'Kristin', 'Kristina', 'Krystyna', 'Kunigunde', 'Käte', 'Käthe',
        'Larissa', 'Laura', 'Lena', 'Leni', 'Leonore', 'Liane', 'Lidia', 'Liesbeth', 'Liesel', 'Lieselotte', 'Lilli', 'Lilly', 'Lilo', 'Lina', 'Linda', 'Lisa', 'Lisbeth', 'Liselotte', 'Loni', 'Lore', 'Lotte', 'Lucia', 'Lucie', 'Ludmila', 'Ludmilla', 'Luise', 'Luzia', 'Luzie', 'Lydia',
        'Madeleine', 'Magda', 'Magdalena', 'Magdalene', 'Maike', 'Maja', 'Mandy', 'Manja', 'Manuela', 'Mareike', 'Maren', 'Marga', 'Margareta', 'Margarete', 'Margaretha', 'Margarethe', 'Margarita', 'Margit', 'Margitta', 'Margot', 'Margret', 'Margrit', 'Maria', 'Marianne', 'Marie', 'Marie-Luise', 'Marietta', 'Marija', 'Marika', 'Marina', 'Marion', 'Marita', 'Maritta', 'Marlen', 'Marlene', 'Marlies', 'Marliese', 'Marlis', 'Marta', 'Martha', 'Martina', 'Mathilde', 'Mechthild', 'Meike', 'Melanie', 'Melitta', 'Meta', 'Michaela', 'Mina', 'Minna', 'Miriam', 'Mirjam', 'Mona', 'Monica', 'Monika', 'Monique',
        'Nadine', 'Nadja', 'Nancy', 'Natalia', 'Natalie', 'Natalja', 'Natascha', 'Nathalie', 'Nelli', 'Nicole', 'Nina', 'Nora',
        'Olga', 'Ortrud', 'Ottilie',
        'Pamela', 'Patricia', 'Patrizia', 'Paula', 'Pauline', 'Peggy', 'Petra', 'Pia',
        'Ramona', 'Rebecca', 'Regina', 'Regine', 'Reinhild', 'Reinhilde', 'Renata', 'Renate', 'Resi', 'Ria', 'Ricarda', 'Rita', 'Romy', 'Rosa', 'Rosalinde', 'Rose', 'Rosel', 'Rosemarie', 'Rosi', 'Rosina', 'Rosita', 'Rosmarie', 'Roswitha', 'Ruth',
        'Sabina', 'Sabine', 'Sabrina', 'Sandra', 'Sandy', 'Sara', 'Sarah', 'Saskia', 'Selma', 'Sibylle', 'Sieglinde', 'Siegrid', 'Siglinde', 'Sigrid', 'Sigrun', 'Silke', 'Silvana', 'Silvia', 'Simona', 'Simone', 'Sina', 'Sofia', 'Sofie', 'Sonja', 'Sophia', 'Sophie', 'Stefanie', 'Steffi', 'Stephanie', 'Susan', 'Susann', 'Susanna', 'Susanne', 'Svenja', 'Svetlana', 'Swetlana', 'Sybille', 'Sylke', 'Sylvia',
        'Tamara', 'Tanja', 'Tatjana', 'Teresa', 'Thea', 'Thekla', 'Theresa', 'Therese', 'Theresia', 'Tina', 'Traudel', 'Traute', 'Trude',
        'Ulla', 'Ulrike', 'Ursel', 'Ursula', 'Uschi', 'Uta', 'Ute',
        'Valentina', 'Valeri', 'Valerie', 'Vanessa', 'Vera', 'Verena', 'Veronika', 'Viktoria', 'Viola',
        'Walburga', 'Wally', 'Waltraud', 'Waltraut', 'Wanda', 'Wendelin', 'Wera', 'Wiebke', 'Wilhelmine', 'Wilma', 'Wiltrud',
        'Yvonne',
        'Änne',
    );

    /**
         * Top 500 Names from a phone directory (6. January 2005)
         * {@link} https://de.wiktionary.org/wiki/Verzeichnis:Deutsch/Liste_der_h%C3%A4ufigsten_Nachnamen_Deutschlands
         **/
    protected static $lastName = array(
        'Ackermann', 'Adam', 'Adler', 'Ahrens', 'Albers', 'Albert', 'Albrecht', 'Altmann', 'Anders', 'Appel', 'Arndt', 'Arnold', 'Auer',
        'Bach', 'Bachmann', 'Bader', 'Baier', 'Bartels', 'Barth', 'Barthel', 'Bartsch', 'Bauer', 'Baum', 'Baumann', 'Baumgartner', 'Baur', 'Bayer', 'Beck', 'Becker', 'Beckmann', 'Beer', 'Behrendt', 'Behrens', 'Beier', 'Bender', 'Benz', 'Berg', 'Berger', 'Bergmann', 'Berndt', 'Bernhardt', 'Bertram', 'Betz', 'Beyer', 'Binder', 'Bischoff', 'Bittner', 'Blank', 'Block', 'Blum', 'Bock', 'Bode', 'Born', 'Brand', 'Brandl', 'Brandt', 'Braun', 'Brenner', 'Breuer', 'Brinkmann', 'Brunner', 'Bruns', 'Brückner', 'Buchholz', 'Buck', 'Burger', 'Burkhardt', 'Busch', 'Busse', 'Bär', 'Böhm', 'Böhme', 'Böttcher', 'Bühler', 'Büttner',
        'Christ', 'Conrad',
        'Decker', 'Diehl', 'Dietrich', 'Dietz', 'Dittrich', 'Dorn', 'Döring', 'Dörr',
        'Eberhardt', 'Ebert', 'Eckert', 'Eder', 'Ehlers', 'Eichhorn', 'Engel', 'Engelhardt', 'Engelmann', 'Erdmann', 'Ernst', 'Esser',
        'Falk', 'Feldmann', 'Fiedler', 'Fink', 'Fischer', 'Fleischer', 'Fleischmann', 'Forster', 'Frank', 'Franke', 'Franz', 'Freitag', 'Freund', 'Frey', 'Fricke', 'Friedrich', 'Fritsch', 'Fritz', 'Fröhlich', 'Fuchs', 'Fuhrmann', 'Funk', 'Funke', 'Förster',
        'Gabriel', 'Gebhardt', 'Geiger', 'Geisler', 'Geißler', 'Gerber', 'Gerlach', 'Geyer', 'Giese', 'Glaser', 'Gottschalk', 'Graf', 'Greiner', 'Grimm', 'Gross', 'Groß', 'Großmann', 'Gruber', 'Gärtner', 'Göbel', 'Götz', 'Günther',
        'Haag', 'Haas', 'Haase', 'Hagen', 'Hahn', 'Hamann', 'Hammer', 'Hanke', 'Hansen', 'Harms', 'Hartmann', 'Hartung', 'Hartwig', 'Haupt', 'Hauser', 'Hecht', 'Heck', 'Heil', 'Heim', 'Hein', 'Heine', 'Heinemann', 'Heinrich', 'Heinz', 'Heinze', 'Held', 'Heller', 'Hempel', 'Henke', 'Henkel', 'Hennig', 'Henning', 'Hentschel', 'Herbst', 'Hermann', 'Herold', 'Herrmann', 'Herzog', 'Hess', 'Hesse', 'Heuer', 'Heß', 'Hildebrandt', 'Hiller', 'Hinz', 'Hirsch', 'Hoffmann', 'Hofmann', 'Hohmann', 'Holz', 'Hoppe', 'Horn', 'Huber', 'Hummel', 'Hübner',
        'Jacob', 'Jacobs', 'Jahn', 'Jakob', 'Jansen', 'Janssen', 'Janßen', 'John', 'Jordan', 'Jost', 'Jung', 'Jäger', 'Jürgens',
        'Kaiser', 'Karl', 'Kaufmann', 'Keil', 'Keller', 'Kellner', 'Kern', 'Kessler', 'Keßler', 'Kiefer', 'Kirchner', 'Kirsch', 'Klaus', 'Klein', 'Klemm', 'Klose', 'Kluge', 'Knoll', 'Koch', 'Kohl', 'Kolb', 'Konrad', 'Kopp', 'Kraft', 'Kramer', 'Kraus', 'Krause', 'Krauß', 'Krebs', 'Kremer', 'Kretschmer', 'Krieger', 'Kroll', 'Krug', 'Kruse', 'Krämer', 'Kröger', 'Krüger', 'Kuhlmann', 'Kuhn', 'Kunz', 'Kunze', 'Kurz', 'Köhler', 'König', 'Körner', 'Köster', 'Kühn', 'Kühne',
        'Lang', 'Lange', 'Langer', 'Lauer', 'Lechner', 'Lehmann', 'Lemke', 'Lenz', 'Lindemann', 'Lindner', 'Link', 'Linke', 'Lohmann', 'Lorenz', 'Ludwig', 'Lutz', 'Löffler',
        'Mack', 'Mai', 'Maier', 'Mann', 'Marquardt', 'Martens', 'Martin', 'Marx', 'Maurer', 'May', 'Mayer', 'Mayr', 'Meier', 'Meister', 'Meißner', 'Menzel', 'Merkel', 'Mertens', 'Merz', 'Metz', 'Metzger', 'Meyer', 'Michel', 'Michels', 'Miller', 'Mohr', 'Moll', 'Moritz', 'Moser', 'Möller', 'Müller', 'Münch',
        'Nagel', 'Naumann', 'Neubauer', 'Neubert', 'Neuhaus', 'Neumann', 'Nickel', 'Niemann', 'Noack', 'Noll', 'Nolte', 'Nowak',
        'Opitz', 'Oswald', 'Ott', 'Otto',
        'Pape', 'Paul', 'Peter', 'Peters', 'Petersen', 'Pfeifer', 'Pfeiffer', 'Philipp', 'Pieper', 'Pietsch', 'Pohl', 'Popp', 'Preuß', 'Probst',
        'Raab', 'Rapp', 'Rau', 'Rauch', 'Rausch', 'Reich', 'Reichel', 'Reichert', 'Reimann', 'Reimer', 'Reinhardt', 'Reiter', 'Renner', 'Reuter', 'Richter', 'Riedel', 'Riedl', 'Rieger', 'Ritter', 'Rohde', 'Rose', 'Roth', 'Rothe', 'Rudolph', 'Ruf', 'Runge', 'Rupp', 'Röder', 'Römer',
        'Sander', 'Sauer', 'Sauter', 'Schade', 'Schaller', 'Scharf', 'Scheffler', 'Schenk', 'Scherer', 'Schiller', 'Schilling', 'Schindler', 'Schlegel', 'Schlüter', 'Schmid', 'Schmidt', 'Schmitt', 'Schmitz', 'Schneider', 'Scholz', 'Schott', 'Schrader', 'Schramm', 'Schreiber', 'Schreiner', 'Schröder', 'Schröter', 'Schubert', 'Schuler', 'Schulte', 'Schultz', 'Schulz', 'Schulze', 'Schumacher', 'Schumann', 'Schuster', 'Schwab', 'Schwarz', 'Schweizer', 'Schäfer', 'Schön', 'Schüler', 'Schütte', 'Schütz', 'Schütze', 'Seeger', 'Seidel', 'Seidl', 'Seifert', 'Seiler', 'Seitz', 'Siebert', 'Simon', 'Singer', 'Sommer', 'Sonntag', 'Springer', 'Stadler', 'Stahl', 'Stark', 'Steffen', 'Steffens', 'Stein', 'Steinbach', 'Steiner', 'Stephan', 'Stock', 'Stoll', 'Straub', 'Strauß', 'Strobel', 'Stumpf', 'Sturm',
        'Thiel', 'Thiele', 'Thomas',
        'Ullrich', 'Ulrich', 'Unger', 'Urban',
        'Vetter', 'Vogel', 'Vogt', 'Voigt', 'Vollmer', 'Voss', 'Voß', 'Völker',
        'Wagner', 'Wahl', 'Walter', 'Walther', 'Weber', 'Wegener', 'Wegner', 'Weidner', 'Weigel', 'Weis', 'Weise', 'Weiss', 'Weiß', 'Wendt', 'Wenzel', 'Werner', 'Westphal', 'Wetzel', 'Wiedemann', 'Wiegand', 'Wieland', 'Wiese', 'Wiesner', 'Wild', 'Wilhelm', 'Wilke', 'Will', 'Wimmer', 'Winkler', 'Winter', 'Wirth', 'Witt', 'Witte', 'Wittmann', 'Wolf', 'Wolff', 'Wolter', 'Wulf', 'Wunderlich',
        'Zander', 'Zeller', 'Ziegler', 'Zimmer', 'Zimmermann',
    );

    protected static $titleMale = array('Herr', 'Herr Dr.', 'Herr Prof.', 'Herr Prof. Dr.');
    protected static $titleFemale = array('Frau', 'Frau Dr.', 'Frau Prof.', 'Frau Prof. Dr.');

    protected static $suffix = array('B.Sc.', 'B.A.', 'B.Eng.', 'MBA.');

    /**
     * @example 'PhD'
     */
    public static function suffix()
    {
        return static::randomElement(static::$suffix);
    }
}
>>>>>>> 2088f758f1e562a149fe831ca66f9ce355be4535
