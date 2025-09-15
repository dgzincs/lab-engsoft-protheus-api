<?php

app()->get('/', 'ClientsController@index');

app()->get('/clients', 'ClientsController@list');     
app()->get('/clients/new', 'ClientsController@create');
app()->post('/clients', 'ClientsController@store');
app()->get('/clients/{id}', 'ClientsController@show');
app()->get('/clients/{id}/edit', 'ClientsController@edit');
app()->post('/clients/{id}', 'ClientsController@updateClient');
app()->post('/clients/{id}/delete', 'ClientsController@destroy');

