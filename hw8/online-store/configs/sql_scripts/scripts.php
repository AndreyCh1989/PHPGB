<?php

    const GET_ALL = "select * from store.catalog;";
    const GET_PRODUCT = 'select * from store.catalog where id=%d;';
    const GET_AUTH_INFO = 'select * from store.auth where username="%s";';
