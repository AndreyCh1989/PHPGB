<?php

    const GET_ALL = "select * from homework.pic_galery order by views desc;";

    const INCREASE_VIEWS = "update homework.pic_galery set views=views+1 where id=%d;";
