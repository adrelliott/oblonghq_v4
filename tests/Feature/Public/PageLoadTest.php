<?php

it('has home page')
    ->get('/')
    ->assertStatus(200);

it('has about page')
    ->get('/about')
    ->assertStatus(200);

it('has faq page')
    ->get('/faq')
    ->assertStatus(200);

it('has booke a call page')
    ->get('/book')
    ->assertStatus(200);

it('has privacy page')
    ->get('/about/privacy')
    ->assertStatus(200);

it('has cookies page')
    ->get('/about/cookies')
    ->assertStatus(200);

it('has contact page')
    ->get('/about/contact')
    ->assertStatus(200);

