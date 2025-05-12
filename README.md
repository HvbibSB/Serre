# Serre Horticoles

Une serre horticole est une structure fermée et contrôlée utilisée pour la culture de plantes dans des conditions optimales, indépendamment des conditions climatiques extérieures. 

Elle est construite à partir de matériaux transparents comme le verre ou le polycarbonate et peut être chauffée, ventilée, et équipée de systèmes d'irrigation et d'éclairage artificiel pour réguler la température, l'humidité, et la lumière. 

Les serres horticoles permettent de prolonger les saisons de croissance, de protéger les plantes contre les intempéries et les ravageurs, et d'utiliser les ressources de manière plus efficace. 

Elles sont utilisées pour cultiver une variété de plantes, y compris des légumes, des fruits, des fleurs et des plantes exotiques, dans des environnements contrôlés.

Les jardins de Cocagne est une exploitation maraîchère biologique, sous forme d’association, à vocation d’insertion sociale et professionnelle.

Dans le cadre du projet intitulé « Jardins d’Avenir », une nouvelle serre est en cours de constructions sur le site.
 
Cette serre comprendra plusieurs capteurs qui donneront les indications de pluviométrie, hygrométrie, d’anémomètrie, et de température.

En fonction de ces informations, le système devra ouvrir ou fermer les ouvrants de la serre et/ou mettre en fonctionnement un système de ventilations et gérer la température intérieur de la serre. 

Expression du besoin :

Dans le cadre de cette étude, il conviendra donc de mettre en œuvre un système d’acquisition des différentes informations provenant des capteurs capable de :

- mesurer les différentes données climatiques
- stocker les données concernant ces mesures
- interpréter les résultats sous forme de courbe et de tableaux (pour des statistiques climatiques)
- afficher les résultats sur un pc local ou distant
- afficher les résultats sur une page web
- piloter les ouvrants, les ventilateurs et le chauffage

## Répartitions des tâches

### IR1

Configuration de la RaspberryPI et du Système d’acquisition

- Acquérir la température dans la serre
- Acquérir l’hygrométrie dans la serre
- Acquérir l’hygrométrie du sol
- Acquérir la vitesse du vent
- Acquérir  la direction du vent
- Envoyer les mesures dans la Base de données

### IR2

Développement de la partie pilotage de la serre

- Mettre en œuvre les thermostats connectés
- Configurer la Box Max! EQ1
- Piloter les ouvrants de la serre en fonction de la température de la serre
- Piloter le chauffage de la serre en fonction de la température de la serre
- Piloter l’arrosage de la serre en fonction de l’hygrométrie dans la serre
- Concevoir les paramétrages de pilotage de la serre dans la Base de données

### IR3 Mze Habib

Développement de l’interface de la gestion de la serre et Conception de la Base de données

- Concevoir la base de données Serre
- Concevoir le site web Serre permettant de :
  - Configurer le pilotage de la serre
  - Définir les règles de pilotage de la Serre.
- Animer l’équipe de projet

    Le rôle de l’IR3 dans ce projet est essentiel pour assurer l'interface utilisateur et l'interaction fluide avec le système de gestion de la serre intelligente. 

En tant que développeur web, il est responsable de concevoir, développer et maintenir l'Interface Homme-Machine (IHM) qui permet aux utilisateurs d'interagir avec le système. 

Cela inclut la création de tableaux de bord intuitifs pour la consultation des mesures environnementales, la mise en place de formulaires et de contrôles pour envoyer des commandes aux actionneurs, ainsi que l'affichage des retours d'état des actionneurs. 

Le développeur web doit également garantir que l'interface est réactive et accessible sur différents appareils, comme les ordinateurs, les tablettes et les smartphones. 

En collaboration avec les développeurs back-end, qui gèrent le serveur et les bases de données, le développeur web doit s'assurer que les données sont récupérées et affichées en temps réel, offrant ainsi une expérience utilisateur fluide et efficace. 

Il ou elle doit aussi prendre en compte les aspects de sécurité pour protéger les données sensibles et garantir que seules les personnes autorisées peuvent modifier les paramètres de la serre. 

En somme, le développeur web joue un rôle central en rendant la technologie complexe de gestion de la serre accessible et utilisable pour les utilisateurs finaux.
