import React, { useEffect, useRef } from 'react';
import { styled, useTheme } from '@mui/material/styles';
import { Paper, Typography, Container, Box } from '@mui/material'
import Image from 'src/assets/images/slider/hero-img.jpg'
import Typed from "typed.js";
import Page from 'src/components/Page'


const PaperStyle = styled(Paper)(({ theme }) => ({
    width: '100%',
    height: '100vh',
    background: `url(${Image}) top right no-repeat`,
    backgroundSize: 'cover',
    position: 'relative',
}));

const PaperOverlayStyle = styled(Paper)(({ theme }) => ({
    width: '100%',
    height: '100vh',
    background: '#ffffffab',
    backgroundSize: 'cover',
    position: 'relative',
    textAlign: 'center',
    [theme.breakpoints.up('lg')]: {
        textAlign: 'left'
    },
    
}));

const IconStyle = styled('a')(({ theme }) => ({
}));

const ImageStyle = styled('img')(({ theme }) => ({
    marginRight: '10px',
    padding: '4px',
    width: '40px',
    display: 'inline'
}));

const Home = () => {   
    const el = useRef(null); 
    const theme = useTheme();

    useEffect(() => {
        const typed = new Typed(el.current, {
          strings: ["Designer", "Developer", "Freelancer"],
          startDelay: 300,
          typeSpeed: 200,
          backSpeed: 100,
          backDelay: 100,
          smartBackspace: true,
          loop: true,
          showCursor: true,
          cursorChar: ""
        });
    
        // Destropying
        return () => {
          typed.destroy();
        };
      }, []);

    return (
        <Page title="Home | Govind Singh Tomar">
        <PaperStyle>
            <PaperOverlayStyle>
            <Container>
                <Box sx={{
                    padding:'30vh 5%',                    
                }}>
                    <Typography variant="h1" component="h1" sx={{
                                fontWeight: 600,
                                fontSize:'2rem'                                
                            }}>
                        Govind Singh Tomar
                    </Typography>
                    <Box sx={{marginTop:1}}>
                        <Typography variant="h3" component="h3"
                            sx={{
                                display:"inline",
                                paddingRight:'6px',
                                fontWeight: 500                                
                            }}                            
                        >
                            I'm
                        </Typography>
                        <Typography variant="h3" component="h3" ref={el} 
                            sx={{
                                display:"inline",
                                color:theme.palette.primary.main,
                                fontWeight: 500
                            }}
                            >
                            Designer
                        </Typography>
                    </Box>
                    <Box sx={{marginTop:3}}>
                        <IconStyle href="https://www.linkedin.com/in/iamgovindtomar" target="_blank">
                            <ImageStyle src="https://cdn.jsdelivr.net/gh/devicons/devicon/icons/linkedin/linkedin-original.svg"/>
                        </IconStyle>
                        <IconStyle href="https://github.com/govindtomar" target="_blank">
                            <ImageStyle src="https://cdn.jsdelivr.net/gh/devicons/devicon/icons/github/github-original.svg"/>
                        </IconStyle>
                    </Box>
                </Box>
            </Container>
            </PaperOverlayStyle>
        </PaperStyle>
        </Page>
    );
}

export default Home
