-- CREATE DATABASE YORDI;
USE YORDI;
DROP TABLE users;
DROP TABLE notes;

CREATE TABLE users (
  username VARCHAR(50) PRIMARY KEY,
  password VARCHAR(100) NOT NULL,
  email VARCHAR(100) NOT NULL,
  full_name VARCHAR(100),
  date_format VARCHAR(20) NOT NULL 
);

INSERT INTO users (username, password, email, full_name, date_format) 
VALUES 
    ('ValiantWarrior', '$2y$10$ndjDEs/0p1VVzS1bR./vDOOgj.s6xoWAEpTeDhl3fhek9FXaDQ3f2', 'test_1@test.com', 'Shinji', 'd-m-Y'),
    ('lazy_skelleton', '$2y$10$ndjDEs/0p1VVzS1bR./vDOOgj.s6xoWAEpTeDhl3fhek9FXaDQ3f2', 'test_2@test.com', 'Sans', 'm-d-Y'),
    ('VampLord', '$2y$10$ndjDEs/0p1VVzS1bR./vDOOgj.s6xoWAEpTeDhl3fhek9FXaDQ3f2', 'test_3@test.com', 'Dio', 'Y-M-d'),
    ('Patrick', '$2y$10$ndjDEs/0p1VVzS1bR./vDOOgj.s6xoWAEpTeDhl3fhek9FXaDQ3f2', 'test_4@test.com', 'Spongebob', 'F d');


CREATE TABLE notes (
    ID INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(255) NOT NULL,
    title VARCHAR(255) NOT NULL,
    content TEXT NOT NULL,
    date_created TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

INSERT INTO notes (username, title, content, date_created) VALUES
    ('VampLord', 'Vampire Spa Day', 'Had a relaxing spa day. Turned some bats into hairbrushes. Feeling fabulous!', NOW() - INTERVAL FLOOR(RAND() * 5) + 1 YEAR),
    ('VampLord', 'Foolish Mortals', 'Spent the day playing hide-and-seek with the Joestars. They never find me behind the curtains.', NOW() - INTERVAL FLOOR(RAND() * 5) + 1 YEAR),
    ('VampLord', 'Fashionista Dio', 'Tried on 30 different capes today. Can\'t decide which one makes me look more fabulous. Maybe I\'ll wear them all.', NOW() - INTERVAL FLOOR(RAND() * 5) + 1 YEAR),
    ('VampLord', 'Stared at a Teapot', 'Spent an hour contemplating the deep philosophical meaning of a teapot. Concluded that it looks better with a top hat.', NOW() - INTERVAL FLOOR(RAND() * 5) + 1 YEAR),
    ('VampLord', 'Secret Vampire Karaoke', 'Sang "It\'s Raining Men" while unleashing vampire bats. They sang backup. It was glorious!', NOW() - INTERVAL FLOOR(RAND() * 5) + 1 YEAR),
    ('VampLord', 'Dio the Stand-up Comedian', 'Tried stand-up comedy. Made the audience laugh so hard that they started crying blood. A smashing success!', NOW() - INTERVAL FLOOR(RAND() * 5) + 1 YEAR);

INSERT INTO notes (username, title, content, date_created) VALUES
    ('lazy_skelleton', 'Another Day in Snowdin', 'Woke up, had some ketchup, and told some jokes. Life as usual in Snowdin.', NOW() - INTERVAL FLOOR(RAND() * 5) + 1 YEAR),
    ('lazy_skelleton', 'Who Needs Sleep?', 'Been pulling pranks on humans all night. Feeling lazy but still having fun.', NOW() - INTERVAL FLOOR(RAND() * 5) + 1 YEAR),
    ('lazy_skelleton', 'Papyrus and His Spaghetti', 'Caught Papyrus trying to make spaghetti again. It was a disaster as usual.', NOW() - INTERVAL FLOOR(RAND() * 5) + 1 YEAR),
    ('lazy_skelleton', 'The Shortcut through Hotland', 'Found a shortcut through Hotland. Who needs puzzles when you can speedrun?', NOW() - INTERVAL FLOOR(RAND() * 5) + 1 YEAR),
    ('lazy_skelleton', 'Sansational Puns', 'Came up with some top-notch puns today. Papyrus wasn\'t impressed, but I know they were great.', NOW() - INTERVAL FLOOR(RAND() * 5) + 1 YEAR),
    ('lazy_skelleton', 'Mysterious Door in the Basement', 'Discovered a mysterious door in the basement. Wonder what\'s behind it...', NOW() - INTERVAL FLOOR(RAND() * 5) + 1 YEAR),
    ('lazy_skelleton', 'Grillby\'s Good Times', 'Spent the evening at Grillby\'s. Good food, good friends, good times.', NOW() - INTERVAL FLOOR(RAND() * 5) + 1 YEAR),
    ('lazy_skelleton', 'Shortcuts in the Ruins', 'Found some shortcuts in the Ruins. Made getting around a lot easier.', NOW() - INTERVAL FLOOR(RAND() * 5) + 1 YEAR),
    ('lazy_skelleton', 'The Mystery of Gaster', 'Heard rumors about Gaster. The man who speaks in hands... Intriguing.', NOW() - INTERVAL FLOOR(RAND() * 5) + 1 YEAR),
    ('lazy_skelleton', 'A Tale of Two Brothers', 'Shared some old stories with Papyrus today. Memories of a long-lost time.', NOW() - INTERVAL FLOOR(RAND() * 5) + 1 YEAR);


INSERT INTO notes (username, title, content, date_created) VALUES
    ('Patrick', 'Jellyfishing Adventure', 'Went jellyfishing with SpongeBob. Accidentally caught Squidward instead of jellyfish. Good times!', NOW() - INTERVAL FLOOR(RAND() * 3) + 1 MONTH),
    ('Patrick', 'Rock-a-Bye, Baby', 'Took a nap under my rock. Dreamt of dancing with jellyfish. I\'m the jellyfishing king!', NOW() - INTERVAL FLOOR(RAND() * 3) + 1 MONTH),
    ('Patrick', 'Karate Chops', 'Practiced karate with Sandy. Managed to break a plank of wood with my pinky. I\'m unstoppable!', NOW() - INTERVAL FLOOR(RAND() * 3) + 1 MONTH),
    ('Patrick', 'Underwater Band', 'Started a band with SpongeBob and Squidward. Played the air guitar like a pro!', NOW() - INTERVAL FLOOR(RAND() * 3) + 1 MONTH),
    ('Patrick', 'Treasure Hunting', 'Went on a treasure hunt with SpongeBob. Found a Krabby Patty under a rock. It was delicious!', NOW() - INTERVAL FLOOR(RAND() * 3) + 1 MONTH),
    ('Patrick', 'Bubble Blowing Fun', 'Spent the day blowing bubbles with SpongeBob. Accidentally floated away. Fortunately, Sandy saved me!', NOW() - INTERVAL FLOOR(RAND() * 3) + 1 MONTH),
    ('Patrick', 'Time for Ice Cream', 'Ate 20 ice cream cones. Brain freeze! But it was totally worth it!', NOW() - INTERVAL FLOOR(RAND() * 3) + 1 MONTH),
    ('Patrick', 'Secret Superhero', 'Discovered I have superhero powers. My special ability? Sleeping for 24 hours straight!', NOW() - INTERVAL FLOOR(RAND() * 3) + 1 MONTH),
    ('Patrick', 'Best Friends Forever', 'Hanged out with SpongeBob all day. We laughed, we cried, we jellyfished. BFFs forever!', NOW() - INTERVAL FLOOR(RAND() * 3) + 1 MONTH),
    ('Patrick', 'Bikini Bottom Party', 'Hosted a party at my rock. The whole town was there! What a blast!', NOW() - INTERVAL FLOOR(RAND() * 3) + 1 MONTH),
    ('Patrick', 'Bubble Buddy', 'Spent the day with my new best friend, Bubble Buddy. We had a blast causing mischief around town!', NOW() - INTERVAL FLOOR(RAND() * 90) DAY),
    ('Patrick', 'The Krusty Krab', 'Tried to help out at the Krusty Krab today, but I ended up causing chaos in the kitchen. Oops!', NOW() - INTERVAL FLOOR(RAND() * 90) DAY),
    ('Patrick', 'Sea Bear Attack', 'Had a wild encounter with a sea bear today. Luckily, I survived by playing dead like SpongeBob taught me!', NOW() - INTERVAL FLOOR(RAND() * 90) DAY);


INSERT INTO notes (username, title, content, date_created) VALUES
    ('ValiantWarrior', 'Loneliness', 'Feeling so alone and isolated. No one seems to understand me, and I can\'t connect with anyone.', NOW() - INTERVAL FLOOR(RAND() * 3) + 1 MONTH),
    ('ValiantWarrior', 'Painful Memories', 'My past haunts me every day. The pain is unbearable, and I can\'t escape from it.', NOW() - INTERVAL FLOOR(RAND() * 3) + 1 MONTH),
    ('ValiantWarrior', 'Eva Battles', 'Another day, another fight in the Eva. I\'m tired of this endless cycle of violence and destruction.', NOW() - INTERVAL FLOOR(RAND() * 3) + 1 MONTH),
    ('ValiantWarrior', 'Father\'s Disapproval', 'No matter what I do, my father never approves of me. I feel like I\'m constantly disappointing him.', NOW() - INTERVAL FLOOR(RAND() * 3) + 1 MONTH),
    ('ValiantWarrior', 'Existential Crisis', 'What is my purpose? Why am I even here? These questions keep me awake at night.', NOW() - INTERVAL FLOOR(RAND() * 3) + 1 MONTH),
    ('ValiantWarrior', 'Fear of Rejection', 'I\'m afraid to open up to others because I fear they will reject and abandon me, just like everyone else.', NOW() - INTERVAL FLOOR(RAND() * 3) + 1 MONTH),
    ('ValiantWarrior', 'Emptiness Inside', 'There\'s a void inside me that I can\'t fill. No matter what I do, I feel empty and broken.', NOW() - INTERVAL FLOOR(RAND() * 3) + 1 MONTH),
    ('ValiantWarrior', 'Sense of Worthlessness', 'I constantly doubt my worth and wonder if I\'m even deserving of love and happiness.', NOW() - INTERVAL FLOOR(RAND() * 3) + 1 MONTH),
    ('ValiantWarrior', 'Fading Hope', 'I used to have hope for the future, but now it\'s slipping away. I don\'t know if things will ever get better.', NOW() - INTERVAL FLOOR(RAND() * 3) + 1 MONTH),
    ('ValiantWarrior', 'Endless Sadness', 'The sadness never seems to go away. It\'s like a dark cloud that follows me wherever I go.', NOW() - INTERVAL FLOOR(RAND() * 3) + 1 MONTH),
    ('ValiantWarrior', 'Isolation', 'I feel so isolated from the world around me. It\'s like I\'m trapped in my own shell, unable to break free.', NOW() - INTERVAL FLOOR(RAND() * 3) + 1 MONTH),
    ('ValiantWarrior', 'Fear of Abandonment', 'I\'m terrified of being abandoned by the people I care about. It\'s like I\'m always waiting for them to leave me.', NOW() - INTERVAL FLOOR(RAND() * 3) + 1 MONTH),
    ('ValiantWarrior', 'Insecurity', 'I can\'t help but compare myself to others and feel inadequate. It seems like everyone else is so much better than me.', NOW() - INTERVAL FLOOR(RAND() * 3) + 1 MONTH),
    ('ValiantWarrior', 'Failed Expectations', 'No matter what I do, I always seem to disappoint others and myself. I\'m a failure.', NOW() - INTERVAL FLOOR(RAND() * 3) + 1 MONTH),
    ('ValiantWarrior', 'Overwhelmed', 'The weight of the world feels too much to bear. I don\'t know how much longer I can hold on.', NOW() - INTERVAL FLOOR(RAND() * 3) + 1 MONTH),
    ('ValiantWarrior', 'Hollow Smiles', 'I put on a smile to hide my pain, but inside, I\'m crumbling. It\'s exhausting pretending to be okay.', NOW() - INTERVAL FLOOR(RAND() * 3) + 1 MONTH),
    ('ValiantWarrior', 'Unreachable Dreams', 'I used to dream of a better future, but now those dreams feel so distant and unattainable.', NOW() - INTERVAL FLOOR(RAND() * 3) + 1 MONTH),
    ('ValiantWarrior', 'Self-Blame', 'I blame myself for everything that goes wrong. It\'s like I\'m my own worst enemy.', NOW() - INTERVAL FLOOR(RAND() * 3) + 1 MONTH),
    ('ValiantWarrior', 'Cycles of Pain', 'I\'m stuck in a never-ending cycle of pain and suffering. It\'s like I\'m destined to suffer.', NOW() - INTERVAL FLOOR(RAND() * 3) + 1 MONTH),
    ('ValiantWarrior', 'Dark Thoughts', 'I can\'t escape the dark thoughts that haunt my mind. They consume me, and I don\'t know how to break free.', NOW() - INTERVAL FLOOR(RAND() * 3) + 1 MONTH);

