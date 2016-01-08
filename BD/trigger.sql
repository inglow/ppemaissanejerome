drop trigger ajoutclient;
delimiter //
create trigger ajoutclient
before insert on client
for each row
begin
declare x int;
Select count(*) into x from personne where idp=new.idpcl;
if x=0 
	then
	insert into personne values(new.idpcl, new.nomp, new.prenomp, new.adresse, new.cp, new.telephone, new.email,
	new.avatar, new.pseudo, new.mdp);
end if;
Select count(*) into x from administrateur where ida=new.idpcl;
if x>0 then SIGNAL SQLSTATE '45000' SET MESSAGE_TEXT='Le client est déja administrateurs';
end if;
Select count(*) into x from gestionnaire where idg=new.idpcl;
if x>0 then SIGNAL SQLSTATE  '45000' SET MESSAGE_TEXT='Le client est déja gestionnaire';
end if;
end //
delimiter ;

drop trigger ajoutadmin;
delimiter //
create trigger ajoutadmin
before insert on administrateur
for each row
begin
declare x int;
Select count(*) into x from personne where idp=new.ida;
if x=0 
	then
	insert into personne values(new.ida, new.nomp, new.prenomp, new.adresse, new.cp, new.telephone, new.email,
	new.avatar, new.pseudo, new.mdp);
end if;
Select count(*) into x from client where idpcl=new.ida;
if x>0 then SIGNAL SQLSTATE '45000' SET MESSAGE_TEXT='L administrateur est déja client';
end if;
Select count(*) into x from coach where idpco=new.ida;
if x>0 then SIGNAL SQLSTATE '45000' SET MESSAGE_TEXT='L administrateur ne peut être coach';
end if;
end //
delimiter ;
drop trigger ajoutcoach;
delimiter //
create trigger ajoutcoach
before insert on coach
for each row
begin
declare x int;
Select count(*) into x from personne where idp=new.idpco;
if x=0 
	then
	insert into personne values(new.idpco, new.nomp, new.prenomp, new.adresse, new.cp, new.telephone, new.email,
	new.avatar, new.pseudo, new.mdp);
end if;
Select count(*) into x from client where idpcl=new.idpco;
if x>0 then SIGNAL SQLSTATE '45000' SET MESSAGE_TEXT='Le coach est déja client';
end if;
Select count(*) into x from administrateur where ida=new.idpco;
if x>0 then SIGNAL SQLSTATE '45000' SET MESSAGE_TEXT='Le coach est déja administrateur';
end if;
Select count(*) into x from gestionnaire where idg=new.idpco;
if x>0 then SIGNAL SQLSTATE  '45000' SET MESSAGE_TEXT='Le coach est déja gestionnaire';
end if;
end //
delimiter ;
drop trigger ajoutgestionnaire;
delimiter //
create trigger ajoutgestionnaire
before insert on gestionnaire
for each row
begin
declare x int;
Select count(*) into x from personne where idp=new.idg;
if x=0 
	then
	insert into personne values(new.idg, new.nomp, new.prenomp, new.adresse, new.cp, new.telephone, new.email,
	new.avatar, new.pseudo, new.mdp);
end if;
Select count(*) into x from client where idpcl=new.idg;
if x>0 then SIGNAL SQLSTATE '45000' SET MESSAGE_TEXT='Le gestionnaire est déja client';
end if;
Select count(*) into x from coach where idpco=new.idg;
if x>0 then SIGNAL SQLSTATE  '45000' SET MESSAGE_TEXT='Le gestionnaire est déja coach';
end if;
end //
delimiter ;
drop trigger etat;
delimiter //
create trigger etat
	before update on abonnement 
	for each row 
	begin
	if new.datedebut is NULL
		then update client 
		SET etat='prospect';
		end if;
	if old.datefin is NOT NULL 
	then update client
	SET etat='inactif';
	end if;
	if new.datedebut is NOT NULL 
	and new.datefin is NULL OR new.datefin>curedate()
	then update client
	SET etat='actif';
	end if;
	end //
	delimiter ;

