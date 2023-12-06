INSERT INTO filmescards (titulo, categoria, img) VALUES
('Gênesis', 'Documentario', 'filme-1.jpg'),
('Mario bros the Super', 'Aventura', 'filme-2.jpg'),
('What if', 'Romance', 'filme-3.jpg'),
('Jungle Cruise', 'Aventura', 'filme-4.jpg'),
('Avengers endgame', 'Ação', 'filme-5.jpg'),
('The falcon and the winter soldier', 'Ação', 'filme-6.jpg'),
('Howkeye', 'Ação', 'filme-7.jpg'),
('Psicose', 'Suspense', 'filme-8.jpg'),
('Toy Story', 'Animação', 'filme-9.jpg'),
('Jumanji', 'Aventura', 'filme-10.jpg'),
('Shang-thi', 'Mistério', 'filme-11.jpg'),
('Wolverine', 'Ação', 'filme-12.jpg'),
('The Flash Armageddon', 'Avetura', 'filme-13.jpg'),
('Spectre', 'Documentário', 'filme-14.jpg'),
('Money Heist', 'Ação', 'filme-15.jpg'),
('Três Homens em Conflito', 'Western', 'filme-16.jpg'),
('God Of War III', 'Ação', 'filme-17.jpg');




CREATE TABLE IF NOT EXISTS filmescards (
    id_filme INT AUTO_INCREMENT PRIMARY KEY,
        titulo VARCHAR(255) NOT NULL,
            categoria VARCHAR(255) NOT NULL,
                favorito BOOLEAN NOT NULL,
                    filmealta BOOLEAN NOT NULL,
                        img VARCHAR(255) NOT NULL
)
