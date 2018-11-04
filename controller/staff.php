<?php

if_get('/staffs', function ()
{/*{{{*/
    $inputs = [];
    list(
        $inputs['name'],
        $inputs['sex']
    ) = input_list(
        'name',
        'sex'
    );
    $inputs = array_filter($inputs, 'not_null');

    $inputs['delete_time'] = null;

    return render('staff/list', [
        'staffs' =>dao('staff')->find_all_by_column($inputs),
    ]);
});/*}}}*/

if_get('/staffs/add', function ()
{/*{{{*/
    return render('staff/add');
});/*}}}*/

if_post('/staffs/add', function ()
{/*{{{*/
    $inputs = [];
    list(
        $inputs['name'],
        $inputs['sex']
    ) = input_list(
        'name',
        'sex'
    );
    $inputs = array_filter($inputs, 'not_null');

    $staff = staff::create();

    foreach ($inputs as $property => $value) {
        $staff->{$property} = $value;
    }

    return redirect('/staffs');
});/*}}}*/

if_get('/staffs/update/*', function ($staff_id)
{/*{{{*/
    $staff = dao('staff')->find($staff_id);
    otherwise($staff->is_not_null(), 'staff not found');

    return render('staff/update', [
        'staff' => $staff,
    ]);
});/*}}}*/

if_post('/staffs/update/*', function ($staff_id)
{/*{{{*/
    $staff = dao('staff')->find($staff_id);
    otherwise($staff->is_not_null(), 'staff not found');

    $inputs = [];
    list(
        $inputs['name'],
        $inputs['sex']
    ) = input_list(
        'name',
        'sex'
    );
    $inputs = array_filter($inputs, 'not_null');

    foreach ($inputs as $property => $value) {
        $staff->{$property} = $value;
    }

    redirect('/staffs');
});/*}}}*/

if_post('/staffs/delete/*', function ($staff_id)
{/*{{{*/
    $staff = dao('staff')->find($staff_id);
    otherwise($staff->is_not_null(), 'staff not found');

    $staff->delete();

    redirect('/staffs');
});/*}}}*/