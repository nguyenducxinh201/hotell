delimiter $$
create procedure insert_lease_room(_id int(10))
begin
    DECLARE tu int;
    declare den int;
    declare tong int;
    declare roomm int;
    set tu=0;
    set tong= (select count(*) from book_room_details where bookroom_id=_id);
    while tu<tong do
        set roomm= (select room_id from book_room_details where bookroom_id=_id limit tu,1);
        insert into  lease_rooms(bookroom_id,room_id,checkin) values(_id,roomm,now());
        set tu=tu+1;
   end while;    
end;

    /*select concat('tu',tu); */
call insert_lease_room(3)

DROP PROCEDURE IF EXISTS pTest();


delimiter |
create trigger insert_lease
after update
on book_rooms
for each row begin
 IF new.bookroom_active=1 THEN 
    update book_room_details set active=1 where bookroom_id=old.id;
    call insert_lease_room(old.id);
 END IF;
 
END;


