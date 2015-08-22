#!/usr/bin/perl

$host = $ARGV[0];
$usr = $ARGV[1];
$pwd = $ARGV[2];
$db = $ARGV[3];

@record=();
use DBI();

open(DATA,"<:utf8","books_list.xml") or die("cannot open books_list.xml");

my $dbh=DBI->connect("DBI:mysql:database=$db;host=$host","$usr","$pwd") or die $DBI::errstr;
$dbh->{'mysql_enable_utf8'} = 1;
$dbh->do('set names utf8');

$sth11=$dbh->prepare("CREATE TABLE Books(title varchar(1000), 
authors varchar(2000),
book_id varchar(50), 
language varchar(10), 
category varchar(1000)) 
ENGINE=MyISAM character set utf8 collate utf8_general_ci;");

$sth11->execute() or die $DBI::errstr;
$sth11->finish(); 

$line=<DATA>;

while($line)
{

	chop($line);
	
	#~ if($line =~ /<volume vnum="(.*)">/)
	#~ {
		#~ $volume = $1;
	#~ }
	#~ elsif($line =~ /<issue inum="(.*)" month="(.*)" year="(.*)" theme="(.*)">/)
	#~ {
		#~ $issue = $1;
		#~ $month = $2;
		#~ $year = $3;
		#~ $theme = $4;
	#~ }
	#~ 
	if($line =~ /<title>(.*)<\/title>/)
	{
		$title = $1;
	}
	elsif($line =~ /<book_code>(.*)<\/book_code>/)
	{
		$book_code = $1;		
	}
	elsif($line =~ /<language>(.*)<\/language>/)
	{
		$language = $1;		
	}
	elsif($line =~ /<category>(.*)<\/category>/)
	{
		$category = $1;		
	}
	elsif($line =~ /<author>(.*)<\/author>/)
	{
		$authors = $authors. ";" . $1;
	}
	elsif($line =~ /<\/entry>/)
	{
		insert_list($title, $authors, $book_code, $language, $category);
		$title="";
		$authors="";
		$book_code="";
		$language="";
		$category="";
	}
	
	$line = <DATA>;
}	

close(DATA);

sub insert_list
{
	my ($title, $authors, $book_code, $language, $category)=@_;

	$title =~ s/'|'/\\'/g;
	$authors =~ s/'|'/\\'/g;
	$authors =~ s/^;//g;
	
	
	
	#~ $title =~ s/(/\\(/g;
	#~ $title =~ s/)/\\)/g;
	

	#~ if($author ne "")
	#~ {
		#~ $sth=$dbh->prepare("select authid from author where authorname='$author' and salutation='$salutation'");
		#~ $sth->execute() or die $DBI::errstr;
			#~ 
		#~ my $ref = $sth->fetchrow_hashref();
		#~ 
		#~ $authid = $ref->{'authid'};
		#~ $sth->finish();
	#~ }
	#~ else
	#~ {
		#~ $authid = 0;
	#~ }
		
	$sth1=$dbh->prepare("insert into Books values('$title','$authors','$book_code','$language','$category')");
	$sth1->execute() or die $DBI::errstr;
	$sth1->finish();
}

$dbh->disconnect();
