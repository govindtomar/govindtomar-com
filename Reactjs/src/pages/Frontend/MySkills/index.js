import * as React from 'react';
import {Paper, Container, Grid, Typography } from '@mui/material';
import PageHeader from 'src/pages/Frontend/components/PageHeader';
import { alpha, styled } from '@mui/material/styles';
import Page from 'src/components/Page'

const PaperStyle = styled(Paper)(({ theme }) => ({
    borderRadius: 0,
    background: 'transparent',
    [theme.breakpoints.up('lg')]: {
      marginTop: 120
    },
}));

const ImageStyle = styled('img')(({ theme }) => ({
    margin: 'auto',
    padding: 30,
    width: 150
}));

const TypographyStyle = styled(Typography)(({ theme }) => ({
    margin: 'auto',
    textAlign: 'center',
    color: alpha(theme.palette.common.black, .6)
}));

export default function MySkills() {
  return (
    <Page title="My Skills | Govind Singh Tomar">
    <PaperStyle>
        <Container maxWidth="lg">
            <PageHeader>My Skills</PageHeader>
            <Grid container spacing={4} mb={6}>
                { icons && icons.map((icon, index) => (
                    <Grid item xs={6} md={3} mt={2} key={index}>
                        <ImageStyle src={icon.img}/>
                        <TypographyStyle component="h4" variant="h4">{icon.title}</TypographyStyle>
                    </Grid>
                ))}
            </Grid>
        </Container>
    </PaperStyle>
    </Page>
  );
}

const icons = [
  {
    img: 'https://cdn.jsdelivr.net/gh/devicons/devicon/icons/html5/html5-plain.svg',
    title: 'HTML',
  },
  {
    img: 'https://cdn.jsdelivr.net/gh/devicons/devicon/icons/css3/css3-plain.svg',
    title: 'CSS',
  },
  {
    img: 'https://cdn.jsdelivr.net/gh/devicons/devicon/icons/php/php-plain.svg',
    title: 'PHP',
  },
  {
    img: 'https://cdn.jsdelivr.net/gh/devicons/devicon/icons/laravel/laravel-plain.svg',
    title: 'Laravel',
  },
  {
    img: 'https://cdn.jsdelivr.net/gh/devicons/devicon/icons/javascript/javascript-plain.svg',
    title: 'Javascript',
  },
  {
    img: 'https://cdn.jsdelivr.net/gh/devicons/devicon/icons/mysql/mysql-plain.svg',
    title: 'MySQL',
  },
  {
    img: 'https://cdn.jsdelivr.net/gh/devicons/devicon/icons/bootstrap/bootstrap-plain.svg',
    title: 'Bootstrap',
  },
  {
    img: 'https://www.zoho.com/sites/default/files/ogimage/zoho-logo.png',
    title: 'Zoho CRM',
  },
  {
    img: 'https://cdn.jsdelivr.net/gh/devicons/devicon/icons/jquery/jquery-plain.svg',
    title: 'jQuery',
  },
  {
    img: 'https://cdn.jsdelivr.net/gh/devicons/devicon/icons/react/react-original.svg',
    title: 'ReactJS',
  },
  {
    img: 'https://cdn.jsdelivr.net/gh/devicons/devicon/icons/wordpress/wordpress-plain.svg',
    title: 'Wordpress',
  },  {
    img: 'https://cdn.jsdelivr.net/gh/devicons/devicon/icons/amazonwebservices/amazonwebservices-original.svg',
    title: 'AWS Cloud',
  },
  {
    img: 'https://cdn.jsdelivr.net/gh/devicons/devicon/icons/googlecloud/googlecloud-original.svg',
    title: 'Google Cloud',
  },
  {
    img: 'https://cdn.jsdelivr.net/gh/devicons/devicon/icons/github/github-original.svg',
    title: 'Github',
  },
  {
    img: 'https://cdn.jsdelivr.net/gh/devicons/devicon/icons/git/git-original.svg',
    title: 'Git',
  },
];