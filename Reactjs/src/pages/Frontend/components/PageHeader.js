import * as React from 'react';
import { alpha, styled } from '@mui/material/styles';
import { 
    Typography,
    Divider 
} from '@mui/material';
import Iconify from 'src/components/Iconify';


const TypographyStyle = styled(Typography)(({ theme }) => ({
    textAlign: 'center',
    marginBottom: '0px',
    marginTop: '60px',
    fontSize: '2.6rem'
}));

const DividerStyle = styled(Divider)(({ theme }) => ({
    marginLeft: 'auto',
    marginRight: 'auto',
    width:'80%',
    '&::before, &::after': {
        borderTop: `solid ${alpha(theme.palette.primary.main, .3)}`,
    },
    [theme.breakpoints.up('lg')]: {
        width:'50%',
    },

}));

const IconifyStyle = styled(Iconify)(({ theme }) => ({
    marginBottom: '-6px',
    color: alpha(theme.palette.primary.main, .7),
    fontSize: '25px'
}));


const PageHeader = (props) => {
    return (
        <React.Fragment>
            <TypographyStyle
                component="h1"
                {...props}
            />
            <DividerStyle>
                <IconifyStyle icon="ic:sharp-sports-basketball"/>
            </DividerStyle>
        </React.Fragment>

    )
}

export default PageHeader