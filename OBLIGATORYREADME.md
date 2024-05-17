Ielogoties git 
-----------------
`eval "$(ssh-agent -s)"
ssh-add ~/.ssh/<name>`


Klonēt github repozitoriju ar
-----------------
git clone git@github.com:Citadaskola-2023/AdriansA-Degvielas_ceki.git main

Gadījumā ja neļauj noklonēt fatal error dēļ jāpievieno -f atribūts komandai lai to izdarītu piespiedu kārtā ignorējot kļūmes
-----------------
git clone -f git@github.com:Citadaskola-2023/AdriansA-Degvielas_ceki.git main

Ieslēgt docker
-----------------
docker compose up -d
