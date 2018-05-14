#!/usr/bin/perl

use CGI;

# Create the CGI object
my $query = new CGI;

# Output the HTTP header
print $query->header ( );

# Capture the form results
my $firstname = $query->param("firstname");
my $lastname = $query->param("lastname");
my $month = $query->param("month");
my $day = $query->param("day");
my $year = $query->param("year");
my $time = $query->param("time");
my $phone = $query->param("phone");
my $numberofkayaks = $query->param("numberofkayaks");

# Filter the form results
$firstname = filter_header_field ( $firstname );
$lastname = filter_field ( $lastname );
$month = filter_field ( $month );
$day = filter_field ( $day );
$year = filter_field ( $year );
$time = filter_field ( $time );
$phone = filter_field ( $phone );
$numberofkayaks = filter_field ( $numberofkayaks );

# Email the form results
open ( MAIL, "| /usr/lib/sendmail -t" );
print MAIL "From: $email_address\n";
print MAIL "To:showtimeentertainmentdj@gmail.com\n";
print MAIL "Subject: Trip Reservation\n\n";
print MAIL "First Name: $firstname\n";
print MAIL "Last Name: $lastname\n";
print MAIL "Month: $month\n";
print MAIL "Day: $day\n";
print MAIL "Year: $year\n";
print MAIL "Time: $time\n";
print MAIL "Phone: $phone\n";
print MAIL "Number of Kayaks: $numberofkayaks\n";
print MAIL "\n.\n";
close ( MAIL );

# Thank the user
print <<END_HTML;
<html>
<head></head>
<body>Thank you! Your trip will be temporarily reserved. Please wait for a phone call to confirm your reservation.</body>
</html>
END_HTML

# Functions for filtering user input

sub filter_field
{
  my $field = shift;
  $field =~ s/From://gi;
  $field =~ s/To://gi;
  $field =~ s/BCC://gi;
  $field =~ s/CC://gi;
  $field =~ s/Subject://gi;
  $field =~ s/Content-Type://gi;
  return $field;
}

sub filter_header_field
{
  my $field = shift;
  $field =~ s/From://gi;
  $field =~ s/To://gi;
  $field =~ s/BCC://gi;
  $field =~ s/CC://gi;
  $field =~ s/Subject://gi;
  $field =~ s/Content-Type://gi;
  $field =~ s/[\0\n\r\|\!\/\<\>\^\$\%\*\&]+/ /g;
  return $field;
}


