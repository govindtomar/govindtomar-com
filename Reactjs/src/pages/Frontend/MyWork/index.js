import * as React from 'react';
import {Box, ImageList, ImageListItem, Paper, Container } from '@mui/material';
import PageHeader from 'src/pages/Frontend/components/PageHeader';
import { styled } from '@mui/material/styles';
import HeroMedical from 'src/assets/images/my-work/hero-medical.jpg'
import FutureStarr from 'src/assets/images/my-work/futurestarr.jpg'
import Flightsfromhome from 'src/assets/images/my-work/flightsfromhome.jpg'
import TechDotStudy from 'src/assets/images/my-work/tech-study.jpg'
import useResponsive from 'src/hooks/useResponsive';
import Page from 'src/components/Page'


const PaperStyle = styled(Paper)(({ theme }) => ({
    borderRadius: 0,
    background: 'transparent',
    [theme.breakpoints.up('lg')]: {
      marginTop: 120
    },
}));

const ImageListItemStyle = styled(ImageListItem)(({ theme }) => ({
    padding:15,
    background:theme.palette.common.white,
    boxShadow:theme.shadows[8]
}));

const LinkStyle = styled('a')(({ theme }) => ({
  display:'block'
}));


export default function MyWork() {
  const isDesktop = useResponsive('up', 'lg');
  return (
    <Page title="My Work | Govind Singh Tomar">
      <PaperStyle>
          <Container maxWidth="lg">
              <PageHeader>My Recent  Work</PageHeader>
              <Box mt={5} mb={6}>
                  <ImageList variant="masonry" cols={isDesktop ? 2 : 1} gap={15}>
                      {itemData.map((item) => (
                      <ImageListItemStyle key={item.img}>
                          <LinkStyle href={item.url} target="_blank">
                            <img
                              src={`${item.img}`}
                              srcSet={`${item.img}`}
                              alt={item.title}
                              loading="lazy"
                            />
                          </LinkStyle>
                      </ImageListItemStyle>
                      ))}
                  </ImageList>
              </Box>
          </Container>
      </PaperStyle>
    </Page>    
  );
}

const itemData = [
  {
    img: HeroMedical,
    title: 'Hero Medical',
    url: 'https://heromedical.com',
    description: ''
  },
  {
    img: FutureStarr,
    title: 'Future Starr',
    url: 'https://www.futurestarr.com',
    description: ''
  },
  {
    img: Flightsfromhome,
    title: 'Flights From Home',
    url: 'https://www.flightsfromhome.com',
    description: ''
  },
  {
    img: TechDotStudy,
    title: 'Tech Dot Study',
    url: 'https://www.tech.study',
    description: ''
  },
];