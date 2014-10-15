<?php
/**
 * Description of Mstatic
 *
 * @author wiz
 */
class Mstatic extends MY_Model {

    function Mstatic()
    {
        parent::MY_Model();
    }

    function get( $table, $display = TRUE, $pagetitle = TRUE )
    {
        $query = $this->db->get_where('static_content', array('page_name' => $table));
        $content = $query->row_array();

        $this->smarty->assign("pagetitle", $content[$this->curr_lang.'_page_title']);
        $this->smarty->assign("metadesc",  $content[$this->curr_lang.'_meta_description']);
        $this->smarty->assign("metakey",   $content[$this->curr_lang.'_meta_keywords']);
        $this->smarty->assign("section_1", $content[$this->curr_lang.'_section_1']);
        $this->smarty->assign("section_2", $content[$this->curr_lang.'_section_2']);
        $this->smarty->assign("section_3", $content[$this->curr_lang.'_section_3']);
        $this->smarty->assign("section_4", $content[$this->curr_lang.'_section_4']);
        $this->smarty->assign("section_5", $content[$this->curr_lang.'_section_5']);
        $this->smarty->assign("section_6", $content[$this->curr_lang.'_section_6']);
        
        if($pagetitle) $this->smarty->assign('PAGETITLE', WEB_TITLE . ' ' . $content[$this->curr_lang.'_page_title']);

        if($display) $this->smarty->display('pages/'.$table.'.html');
    }

}
