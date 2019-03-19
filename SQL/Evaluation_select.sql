use sho8lana2

select `evaluations`.`evaluation_id`,`evaluations`.`evaluation`,`users`.`User_name`
from evaluations,users
where `evaluations`.`user_id_provider`=`users`.`User_id`

select (sum(`evaluations`.`evaluation`)/(count(`evaluations`.`evaluation`)*10))*100 as "rate",`users`.`User_name`
from evaluations,users
where `evaluations`.`user_id_provider`=`users`.`User_id` 
group by `evaluations`.`evaluation`,`evaluations`.`user_id_provider`

having `evaluations`.`user_id_provider`='5xuXLbSZ40'




