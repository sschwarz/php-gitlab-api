<?php

namespace Gitlab\Api;

class Repositories extends AbstractApi
{

    public function branches($project_id)
    {
        return $this->get('projects/'.urlencode($project_id).'/repository/branches');
    }

    public function branch($project_id, $branch_id)
    {
        return $this->get('projects/'.urlencode($project_id).'/repository/branches/'.urlencode($branch_id));
    }

    public function tags($project_id)
    {
        return $this->get('projects/'.urlencode($project_id).'/repository/tags');
    }

    public function commits($project_id, $page = 0, $per_page = self::PER_PAGE, $ref_name = null)
    {
        return $this->get('projects/'.urlencode($project_id).'/repository/commits', array(
            'page' => $page,
            'per_page' => $per_page,
            'ref_name' => $ref_name
        ));
    }

    public function commit($project_id, $sha)
    {
        return $this->get('projects/'.urlencode($project_id).'/repository/commits/'.urlencode($sha));
    }

    public function diff($project_id, $sha)
    {
        return $this->get('projects/'.urlencode($project_id).'/repository/commits/'.urlencode($sha).'/diff');
    }

    public function tree($project_id, array $params = array())
    {
        return $this->get('projects/'.urlencode($project_id).'/repository/tree', $params);
    }

    public function protectBranch($project_id, $branch_id)
    {
        return $this->put('projects/'.urlencode($project_id).'/repository/branches/'.urlencode($branch_id).'/protect');
    }

    public function unprotectBranch($project_id, $branch_id)
    {
        return $this->put('projects/'.urlencode($project_id).'/repository/branches/'.urlencode($branch_id).'/unprotect');
    }

    public function blob($project_id, $sha, $filepath)
    {
        return $this->get('projects/'.urlencode($project_id).'/repository/commits/'.urlencode($sha).'/blob', array(
            'filepath' => $filepath
        ));
    }

    public function getFile($project_id, $file_path, $ref)
    {
        return $this->get('projects/'.urlencode($project_id).'/repository/files', array(
            'file_path' => $file_path,
            'ref' => $ref
        ));
    }

    public function createFile($project_id, $file_path, $content, $branch_name, $commit_message)
    {
        return $this->post('projects/'.urlencode($project_id).'/repository/files', array(
            'file_path' => $file_path,
            'branch_name' => $branch_name,
            'content' => $content,
            'commit_message' => $commit_message
        ));
    }

    public function updateFile($project_id, $file_path, $content, $branch_name, $commit_message)
    {
        return $this->put('projects/'.urlencode($project_id).'/repository/files', array(
            'file_path' => $file_path,
            'branch_name' => $branch_name,
            'content' => $content,
            'commit_message' => $commit_message
        ));
    }

    public function deleteFile($project_id, $file_path, $branch_name, $commit_message)
    {
        return $this->delete('projects/'.urlencode($project_id).'/repository/files', array(
            'file_path' => $file_path,
            'branch_name' => $branch_name,
            'commit_message' => $commit_message
        ));
    }

    public function getFileArchive($project_id, $sha = null)
    {
        return $this->get('projects/'.urlencode($project_id).'/repository/archive', array(
            'sha' => $sha
        ));
    }
}
