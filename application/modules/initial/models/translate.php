<?php
class Translate extends MY_Model {
	
    function Translate()
    {
        parent::MY_Model();

    }
	
	function get_translate()
	{
		$translate_var = array(
				'home'=>array('id'=>'Halaman Utama','en'=>'Home'), 
				'news'=>array('id'=>'Berita','en'=>'News'),
				'event'=>array('id'=>'Kegiatan','en'=>'Event'),
				'contact_us'=>array('id'=>'Hubungi Kami','en'=>'Contact Us'),
				'links'=>array('id'=>'Links','en'=>'Links'),
				'faq'=>array('id'=>'F.A.Q.','en'=>'F.A.Q.'),
				'about_stuned'=>array('id'=>'Tentang StuNed','en'=>'About StuNed'),
				'testimonials'=>array('id'=>'Testimonials','en'=>'Testimonials'),
				'alumni_voice'=>array('id'=>'Alumni','en'=>'Alumni Voice'),
				'english_course'=>array('id'=>'Peserta Kursus Bahasa Inggris','en'=>'English Course'),
				'employee'=>array('id'=>'Staff','en'=>'Employee'),
				'history'=>array('id'=>'Sejarah','en'=>'History'),
				'general_information'=>array('id'=>'Informasi Umum','en'=>'General Information'),
				'individual_application'=>array('id'=>'Individual Application','en'=>'Individual Application'),
				'regular_programme'=>array('id'=>'Program Regular','en'=>'Regular Programme'),
				'pre_registration'=>array('id'=>'Pre-Registration (hanya diluar Jawa)','en'=>'Pre-Registration (Outside Java Only)'),
				'english_test_information'=>array('id'=>'Informasi Test Bahasa Inggris','en'=>'English Test Information'),
				'group_application'=>array('id'=>'Group Application','en'=>'Group Application'),
				'awardees_corner'=>array('id'=>'Awardees Corner','en'=>'Awardees Corner'),
				'alumni_corner'=>array('id'=>'Alumni Corner','en'=>'Alumni Corner'),
				'alumni_database'=>array('id'=>'Database Alumni','en'=>'Alumni Database'),
				'discussion_forum'=>array('id'=>'Forum Diskusi','en'=>'Discussion Forum'),
				'stuned_celebration'=>array('id'=>'StuNed Celebration','en'=>'StuNed Celebration'),
				'searchable_thesis_database'=>array('id'=>'Pencarian Database Thesis','en'=>'Searchable Thesis Database'),
				'download_center'=>array('id'=>'Download Center','en'=>'Download Center'),
				'general'=>array('id'=>'Umum','en'=>'General'),
				'searchable_thesis_database'=>array('id'=>'Pencarian Database Thesis','en'=>'Search Thesis Database'),
				'search'=>array('id'=>'Pencarian','en'=>'Search'),
				'thesis_database'=>array('id'=>'Database Thesis','en'=>'Thesis Database'),
				'news'=>array('id'=>'Berita','en'=>'News'),
				'event'=>array('id'=>'Acara','en'=>'Event'),
				'read_more'=>array('id'=>'lebih lanjut','en'=>'read more'),
				'back'=>array('id'=>'kembali','en'=>'back'),
				'all_event'=>array('id'=>'semua acara','en'=>'all event'),
				'all_news'=>array('id'=>'semua berita','en'=>'all news')
		);
		return $translate_var;
	}
	
}
?>
