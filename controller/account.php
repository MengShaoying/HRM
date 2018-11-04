<?php

if_get('/accounts', function ()
{/*{{{*/
    $inputs = [];
    list(
        $inputs['email'],
        $inputs['password'],
        $inputs['last_login_ip'],
        $inputs['status']
    ) = input_list(
        'email',
        'password',
        'last_login_ip',
        'status'
    );
    $inputs = array_filter($inputs, 'not_null');

    $inputs['delete_time'] = null;

    return render('account/list', [
        'accounts' =>dao('account')->find_all_by_column($inputs),
    ]);
});/*}}}*/

if_get('/accounts/add', function ()
{/*{{{*/
    return render('account/add');
});/*}}}*/

if_post('/accounts/add', function ()
{/*{{{*/
    $inputs = [];
    list(
        $inputs['email'],
        $inputs['password'],
        $inputs['last_login_ip'],
        $inputs['status']
    ) = input_list(
        'email',
        'password',
        'last_login_ip',
        'status'
    );
    $inputs = array_filter($inputs, 'not_null');

    $account = account::create();

    foreach ($inputs as $property => $value) {
        $account->{$property} = $value;
    }

    return redirect('/accounts');
});/*}}}*/

if_get('/accounts/update/*', function ($account_id)
{/*{{{*/
    $account = dao('account')->find($account_id);
    otherwise($account->is_not_null(), 'account not found');

    return render('account/update', [
        'account' => $account,
    ]);
});/*}}}*/

if_post('/accounts/update/*', function ($account_id)
{/*{{{*/
    $account = dao('account')->find($account_id);
    otherwise($account->is_not_null(), 'account not found');

    $inputs = [];
    list(
        $inputs['email'],
        $inputs['password'],
        $inputs['last_login_ip'],
        $inputs['status']
    ) = input_list(
        'email',
        'password',
        'last_login_ip',
        'status'
    );
    $inputs = array_filter($inputs, 'not_null');

    foreach ($inputs as $property => $value) {
        $account->{$property} = $value;
    }

    redirect('/accounts');
});/*}}}*/

if_post('/accounts/delete/*', function ($account_id)
{/*{{{*/
    $account = dao('account')->find($account_id);
    otherwise($account->is_not_null(), 'account not found');

    $account->delete();

    redirect('/accounts');
});/*}}}*/