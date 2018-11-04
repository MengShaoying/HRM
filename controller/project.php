<?php

if_get('/projects', function ()
{/*{{{*/
    $inputs = [];
    list(
        $inputs['name'],
        $inputs['jira_project_key'],
        $inputs['description']
    ) = input_list(
        'name',
        'jira_project_key',
        'description'
    );
    $inputs = array_filter($inputs, 'not_null');

    $inputs['delete_time'] = null;

    return render('project/list', [
        'projects' =>dao('project')->find_all_by_column($inputs),
    ]);
});/*}}}*/

if_get('/projects/add', function ()
{/*{{{*/
    return render('project/add');
});/*}}}*/

if_post('/projects/add', function ()
{/*{{{*/
    $inputs = [];
    list(
        $inputs['name'],
        $inputs['jira_project_key'],
        $inputs['description']
    ) = input_list(
        'name',
        'jira_project_key',
        'description'
    );
    $inputs = array_filter($inputs, 'not_null');

    $project = project::create();

    foreach ($inputs as $property => $value) {
        $project->{$property} = $value;
    }

    return redirect('/projects');
});/*}}}*/

if_get('/projects/update/*', function ($project_id)
{/*{{{*/
    $project = dao('project')->find($project_id);
    otherwise($project->is_not_null(), 'project not found');

    return render('project/update', [
        'project' => $project,
    ]);
});/*}}}*/

if_post('/projects/update/*', function ($project_id)
{/*{{{*/
    $project = dao('project')->find($project_id);
    otherwise($project->is_not_null(), 'project not found');

    $inputs = [];
    list(
        $inputs['name'],
        $inputs['jira_project_key'],
        $inputs['description']
    ) = input_list(
        'name',
        'jira_project_key',
        'description'
    );
    $inputs = array_filter($inputs, 'not_null');

    foreach ($inputs as $property => $value) {
        $project->{$property} = $value;
    }

    redirect('/projects');
});/*}}}*/

if_post('/projects/delete/*', function ($project_id)
{/*{{{*/
    $project = dao('project')->find($project_id);
    otherwise($project->is_not_null(), 'project not found');

    $project->delete();

    redirect('/projects');
});/*}}}*/