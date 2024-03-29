import * as React from 'react';
import { styled } from '@mui/material/styles';
import { 
    Typography,
} from '@mui/material';


const TypographyStyle = styled(Typography)(({ theme }) => ({
    textAlign: 'center',
    marginBottom: '30px',
    marginTop: '40px'
}));


const SeactionHeader = (props) => {
    return (
        <TypographyStyle variant="h3">{props.header}</TypographyStyle>
    )
}

export default SeactionHeader