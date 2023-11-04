import * as React from 'react';
import List from '@mui/material/List';
import ListItem from '@mui/material/ListItem';
import Divider from '@mui/material/Divider';
import ListItemText from '@mui/material/ListItemText';
import ListItemAvatar from '@mui/material/ListItemAvatar';
import Typography from '@mui/material/Typography';
import Card from '@mui/material/Card';
import CardContent from '@mui/material/CardContent';
import { alpha, styled } from '@mui/material/styles';
import Iconify from 'src/components/Iconify';


const IconifyStyle = styled(Iconify)(({ theme }) => ({
    color: alpha(theme.palette.primary.main, 1),
    fontSize:40
}));


export default function ContactDetails() {
  const contacts = [
    {
      title : "Location",
      detail: "Indore, Madhya Pradesh, India",
      image : <IconifyStyle icon="carbon:location"/>
    },
    {
      title : "Send A Mail",
      detail: "govindtomar01@gmail.com",
      image : <IconifyStyle icon="fluent:mail-20-regular"/>
    },
  ]

  return (
    <Card>
      <CardContent>
        <List sx={{ width: '100%' }}>
          {contacts.map((contact, i) => (
            <div key={i}>
            <ListItem style={{marginTop:15 , marginBottom:15}} 
               alignItems="flex-start"
            >
              <ListItemAvatar>
                {contact.image}
              </ListItemAvatar>
              <ListItemText
                primary={
                <Typography
                  sx={{ display: 'inline' }}
                  variant="h5"
                >
                  {contact.title}
                </Typography>}
                secondary={contact.detail}
              />
            </ListItem> 
            {i < 1 ? <Divider /> : ''}
             
          </div>
          ))}  
            
        </List>
      </CardContent>
    </Card>
  );
}